import { Bot } from "./Bot.js";

export class Game {
  constructor({
    canvas,
    context,
    screen,
    sprites,
    topBarTimer,
    gameOver,
    startTimer,
    KeysListener,
  }) {
    this.canvas = canvas;
    this.context = context;
    this.screen = screen;
    this.canvas.width = this.screen.dimensions.width;
    this.canvas.height = this.screen.dimensions.height;

    this.sprites = sprites;

    this.gravity = 0.5;
    this.topBarTimer = topBarTimer;
    this.topBarTimer.element.innerText = this.topBarTimer.currentValue;
    this.startTimer = startTimer;
    this.gameOver = gameOver;
    this.animationId = null;
    this.KeysListener = KeysListener;

    this.showingWinnerMessage = false;
    this.bot = new Bot({
      player: this.sprites.players.playerOne,
      botPlayer: this.sprites.players.playerTwo,
    });
  }

  setupScreen() {
    const { x, y } = this.screen.positionOnWindow;
    const { width, height } = this.screen.dimensions;

    this.context.fillStyle = "black";
    this.context.fillRect(x, y, width, height);
  }

  animate() {
    this.animationId = window.requestAnimationFrame(this.animate.bind(this));
    this.setupScreen();
    this.update();
  }

  update() {
    this.setEnemyInAttackArea();
    this.drawScneario();
    this.drawPlayers();
  }

  drawPlayers() {
    Object.values(this.sprites.players).forEach((player) => {
      this.finishGame(player);
      this.setLimitOfScreen(player);
      this.gravityForce(player);
      player.update(this.context);
    });
  }

  checkWinner() {
    const { playerOne, playerTwo } = this.sprites.players;
    if (playerOne.health.widthInPercent === playerTwo.health.widthInPercent)
      return null;
    else if (
      playerOne.health.widthInPercent > playerTwo.health.widthInPercent
    ) {
      playerOne.isWinner = true;
      return playerOne;
    }
    playerTwo.isWinner = true;
    return playerTwo;
  }

  drawScneario() {
    Object.values(this.sprites.scnearios).forEach((scneario) => {
      scneario.draw(this.context);
    });
  }

  setLimitOfScreen(player) {
    if (
      player.position.x +
        85 +
        player.currentSprite.image.width / player.currentSprite.maxFrames >=
      this.screen.dimensions.width
    ) {
      player.position.x =
        this.screen.dimensions.width -
        85 -
        player.currentSprite.image.width / player.currentSprite.maxFrames;
    } else if (player.position.x + 200 < -20) {
      player.position.x = -220;
    }
  }

  gravityForce(sprite) {
    if (
      sprite.position.y +
        sprite.currentSprite.image.width / sprite.currentSprite.maxFrames +
        sprite.velocity.y >=
      this.screen.dimensions.height - 95
    ) {
      sprite.velocity.y = 0;
      sprite.position.y =
        this.screen.dimensions.height -
        sprite.currentSprite.image.width / sprite.currentSprite.maxFrames -
        95;
    } else sprite.velocity.y += this.gravity;
  }

  isPlayerAttackedBehindPlayerAttacking(playerAttacking, playerAttacked) {
    if (
      playerAttacking.position.x +
        playerAttacking.currentSprite.image.width /
          playerAttacking.currentSprite.maxFrames >
        playerAttacked.position.x +
          playerAttacked.currentSprite.image.width /
            playerAttacked.currentSprite.maxFrames &&
      playerAttacking.lastMovmentThroughAxiosX === "right"
    ) {
      return true;
    } else if (
      playerAttacking.position.x +
        playerAttacking.currentSprite.image.width /
          playerAttacking.currentSprite.maxFrames <
        playerAttacked.position.x +
          playerAttacked.currentSprite.image.width /
            playerAttacked.currentSprite.maxFrames &&
      playerAttacking.lastMovmentThroughAxiosX === "left"
    ) {
      return true;
    }
    return false;
  }

  isAttackAreaIntersectingPlayer(playerAttacking, playerAttacked) {
    const areaxAttackStart = playerAttacking.attackBox.position.x;
    const areaxPlayerAttackedEnd =
      playerAttacked.position.x +
      playerAttacked.currentSprite.image.width /
        playerAttacked.currentSprite.maxFrames;

    if (
      playerAttacking.attackBox.width +
        70 +
        playerAttacked.currentSprite.image.width /
          playerAttacked.currentSprite.maxFrames >
        areaxPlayerAttackedEnd - areaxAttackStart &&
      areaxAttackStart < areaxPlayerAttackedEnd &&
      !this.isPlayerAttackedBehindPlayerAttacking(
        playerAttacking,
        playerAttacked
      )
    ) {
      return true;
    }
    return false;
  }

  setEnemyInAttackArea() {
    const { playerOne, playerTwo } = this.sprites.players;
    if (this.isAttackAreaIntersectingPlayer(playerOne, playerTwo)) {
      playerOne.enemyInAttackArea = playerTwo;
    } else {
      playerOne.enemyInAttackArea = null;
    }

    if (this.isAttackAreaIntersectingPlayer(playerTwo, playerOne)) {
      playerTwo.enemyInAttackArea = playerOne;
    } else {
      playerTwo.enemyInAttackArea = null;
    }
  }

  handleTimer(stop) {
    if (stop) {
      clearInterval(this.topBarTimer.functionCallback);
      this.topBarTimer.functionCallback = null;
      return;
    }

    this.topBarTimer.functionCallback = setInterval(() => {
      if (this.topBarTimer.currentValue > 0) {
        this.topBarTimer.currentValue -= 1;
        this.topBarTimer.element.innerText = this.topBarTimer.currentValue;
        return;
      }

      clearInterval(this.topBarTimer.functionCallback);
      this.topBarTimer.functionCallback = null;
      this.drawPlayers();
    }, 1000);
  }

  stopListeningKeys() {
    Object.values(this.sprites.players).forEach((player) => {
      window.removeEventListener(
        "keydown",
        player.KeysListener?.handleKeysPressed
      );
      window.removeEventListener("keyup", player.KeysListener?.handleKeysUp);
    });
  }

  stopTopBarTimer() {
    this.handleTimer(true);
  }

  finishGame(player) {
    if (!player.isAlive() && !this.gameOver.value) {
      this.gameOver.value = true;
    } else if (this.topBarTimer.currentValue <= 0) {
      this.gameOver.value = true;
    }

    if (this.gameOver.value) {
      player.stopListeningKeys();
      player.setBaseSprite();

      if (!this.showingWinnerMessage) {
        if (this.checkWinner())
          this.setWinnerMessage(`${this.checkWinner().name} winner`);
        else this.setWinnerMessage("Time Out");
        this.stopTopBarTimer();
      }
    }
    if (player.currentSprite.isLastFrame) {
      cancelAnimationFrame(this.animationId);
    }
  }

  setWinnerMessage(winnerMessage) {
    this.showingWinnerMessage = true;
    this.gameOver.element.innerText = `${winnerMessage}!`;
    this.gameOver.element.classList.add("activeFlex");
  }

  setStartTimer() {
    let count = 2;
    return new Promise((resolve) => {
      let timer = setInterval(() => {
        if (count <= 0) {
          clearInterval(timer);
          this.startTimer.element.classList.remove("activeFlex");
          resolve();
        }
        this.startTimer.element.innerText = count;
        count -= 1;
      }, 1000);
    });
  }

  preloadGame() {
    this.setupScreen();
    this.drawPlayers();
    this.animate();
  }

  async startGame(options) {
    this.startTimer.element.classList.add("activeFlex");
    await this.setStartTimer();

    const { playerOne, playerTwo } = this.sprites.players;
    playerOne.appendKeyListener(this.KeysListener);
    playerOne.appendScreen(this.screen);

    if (options.playersQuantity === "2") {
      playerTwo.appendKeyListener(this.KeysListener);
      playerTwo.appendScreen(this.screen);
    } else {
      playerTwo.appendScreen(this.screen);
      this.bot.start(options.difficultyLevel);
    }

    this.handleTimer();
  }
}
