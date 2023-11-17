export class Player {
  constructor({
    position,
    initialOrientation,
    velocity = {
      x: 0,
      y: 0,
      max: 10,
    },
    health,
    hitPower = 2,
    attackBox = {
      position: {
        x: 0,
        y: 0,
      },
      width: 170,
      height: 50,
    },
    name,
    sprites,
  }) {
    this.position = position;
    this.name = name;

    this.sprites = sprites;
    this.initialOrientation = initialOrientation;

    this.currentSprite =
      initialOrientation === "right"
        ? this.sprites.idleRight
        : this.sprites.idleLeft;

    this.velocity = velocity;
    this.KeysListener = null;
    this.screen = null;

    this.health = health;
    this.hitPower = hitPower;

    this.isMoving = {
      toLeft: false,
      toRight: false,
      toJump: false,
      toAttack: false,
    };

    this.lastMovmentThroughAxiosX = "";

    this.enemyInAttackArea = null;

    this.attackBox = attackBox;
    this.attackBox.position = {
      x: this.position.x,
      y: this.position.y,
    };

    this.isWinner = false;
  }

  appendKeyListener(KeysListener) {
    this.KeysListener = new KeysListener(this);
    this.KeysListener.listenKeys();
  }

  appendScreen(screen) {
    this.screen = screen;
  }

  updateCurrentSprite(newSprite) {
    this.currentSprite = newSprite;
    return this.currentSprite;
  }

  moveToLeft() {
    if (Math.abs(this.velocity.x) < this.velocity.max) {
      this.velocity.x -= 10;
    } else {
      this.velocity.x = -this.velocity.max;
    }
    this.updateCurrentSprite(this.sprites.runToLeft);
    this.lastMovmentThroughAxiosX = "left";

    if (this.isMoving.toJump) this.moveToJump();
  }
  stopMovingToLeft() {
    if (!this.isMoving.toRight) {
      this.velocity.x = 0;
      this.updateCurrentSprite(this.sprites.idleLeft);
    } else if (this.isMoving.toRight) this.moveToRight();

    if (this.isMoving.toJump) this.moveToJump();
  }

  moveToRight() {
    if (Math.abs(this.velocity.x) < this.velocity.max) {
      this.velocity.x += 10;
    } else {
      this.velocity.x = this.velocity.max;
    }

    this.updateCurrentSprite(this.sprites.runToRight);

    this.lastMovmentThroughAxiosX = "right";

    if (this.isMoving.toJump) this.moveToJump();
  }

  stopMovingToRight() {
    if (!this.isMoving.toLeft) {
      this.velocity.x = 0;
      this.updateCurrentSprite(this.sprites.idleRight);
    } else if (this.isMoving.toLeft) this.moveToLeft();
    if (this.isMoving.toJump) this.moveToJump();
  }

  moveToJump() {
    let isOnGround =
      this.screen.dimensions.height -
      95 -
      this.currentSprite.image.width / this.currentSprite.maxFrames;
    if (this.position.y === isOnGround) this.velocity.y = -10;
  }

  decreaseHealth(hitPower) {
    if (this.health.widthInPercent > 0) {
      this.health.widthInPercent -= hitPower;
      this.health.element.style.width = `${this.health.widthInPercent}%`;
    }
  }

  moveToAttack() {
    if (this.lastMovmentThroughAxiosX === "left") {
      this.updateCurrentSprite(this.sprites.attackLeft);
    } else {
      this.updateCurrentSprite(this.sprites.attackRight);
    }

    if (this.enemyInAttackArea) {
      this.enemyInAttackArea.decreaseHealth(this.hitPower);
    }
  }

  stopAttacking() {
    if (
      this.lastMovmentThroughAxiosX.length === 0 &&
      this.initialOrientation === "left"
    )
      this.updateCurrentSprite(this.sprites.idleLeft);
    else if (
      this.lastMovmentThroughAxiosX.length === 0 &&
      this.initialOrientation === "right"
    )
      this.updateCurrentSprite(this.sprites.idleRight);
    else if (this.lastMovmentThroughAxiosX === "left" && !this.isMoving.toLeft)
      this.updateCurrentSprite(this.sprites.idleLeft);
    else if (
      this.lastMovmentThroughAxiosX === "right" &&
      !this.isMoving.toRight
    )
      this.updateCurrentSprite(this.sprites.idleRight);
    else if (this.lastMovmentThroughAxiosX === "left" && this.isMoving.toLeft)
      this.updateCurrentSprite(this.sprites.runToLeft);
    else if (this.lastMovmentThroughAxiosX === "right" && this.isMoving.toRight)
      this.updateCurrentSprite(this.sprites.runToRight);
  }

  drawPlayer(context) {
    this.currentSprite.setPosition(this.position);
    this.currentSprite.draw(context);
    this.position.y += this.velocity.y;
    this.position.x += this.velocity.x;
  }

  updateAttackBoxPosition() {
    this.attackBox.position.x = this.position.x;
    this.attackBox.position.y = this.position.y;
  }

  update(context) {
    this.drawPlayer(context);
    this.updateAttackBoxPosition(context);
  }

  isAlive() {
    if (this.health.widthInPercent <= 0) return false;
    return true;
  }

  stopListeningKeys() {
    this.KeysListener?.stopListenKeys();
  }

  setBaseSprite() {
    if (!this.isAlive() || !this.isWinner) {
      this.updateCurrentSprite(this.sprites.death);
      this.currentSprite.keepLastFrame = true;
      return;
    }

    if (this.lastMovmentThroughAxiosX === "right")
      this.updateCurrentSprite(this.sprites.idleRight);
    else this.updateCurrentSprite(this.sprites.idleLeft);
  }
}
