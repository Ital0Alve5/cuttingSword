export class KeysListener {
  constructor(player) {
    this.handleKeysPressed = this.keysPressed.bind(this);
    this.handleKeysUp = this.keysUp.bind(this);
    this.player = player;
  }

  listenKeys() {
    window.addEventListener("keydown", this.handleKeysPressed);
    window.addEventListener("keyup", this.handleKeysUp);
  }

  stopListenKeys() {
    window.removeEventListener("keydown", this.handleKeysPressed);
    window.removeEventListener("keyup", this.handleKeysUp);
  }

  keysPressed(e) {
    const player = this.player;
    if (!Object.values(player.keysListened).includes(e.code)) return;

    switch (e.code) {
      case player.keysListened.moveLeft:
        player.isMoving.toLeft = true;
        player.moveToLeft();
        break;
      case player.keysListened.moveRight:
        player.isMoving.toRight = true;
        player.moveToRight();
        break;
      case player.keysListened.jump:
        player.isMoving.toJump = true;
        player.moveToJump();
        break;
      case player.keysListened.attack:
        player.isMoving.toAttack = true;
        player.moveToAttack();
    }
  }

  keysUp(e) {
    const player = this.player;

    if (!Object.values(player.keysListened).includes(e.code)) return;

    switch (e.code) {
      case player.keysListened.moveLeft:
        player.isMoving.toLeft = false;
        player.stopMovingToLeft();
        break;
      case player.keysListened.moveRight:
        player.isMoving.toRight = false;
        player.stopMovingToRight();
      case player.keysListened.jump:
        player.isMoving.toJump = false;
        break;
      case player.keysListened.attack:
        player.isMoving.toAttack = false;
        player.stopAttacking();
    }
  }
}
