import { getRandomNumber } from "./utils/getRandomNumber.js";

export class Bot {
  constructor({ player, botPlayer }) {
    this.player = player;
    this.botPlayer = botPlayer;
    this.botStopped = false;
  }

  start(difficultyLevel) {
    const moveInterval = setInterval(() => {
      if (!this.botPlayer.isAlive() || this.botStopped)
        clearInterval(moveInterval);

      this.moveTowardsPlayerOne();
      if (getRandomNumber() === 9) {
        this.botPlayer.moveToJump();
      }
    }, difficultyLevel * 100);
  }

  stop() {
    clearInterval(this.moveInterval);
    this.moveInterval = null;
  }

  moveTowardsPlayerOne() {
    const playerOnePosition = this.player.position;
    const playerTwoPosition = this.botPlayer.position;

    if (playerOnePosition.x > playerTwoPosition.x + 100) {
      this.botPlayer.isMoving.toRight = true;
      this.botPlayer.lastMovmentThroughAxiosX = "right";
      this.botPlayer.moveToRight();
    } else if (playerOnePosition.x + 100 < playerTwoPosition.x) {
      this.botPlayer.isMoving.toLeft = true;
      this.botPlayer.lastMovmentThroughAxiosX = "left";
      this.botPlayer.moveToLeft();
    }

    if (this.botPlayer.enemyInAttackArea) {
      this.botPlayer.moveToAttack();
    } else {
      this.botPlayer.stopAttacking();
    }
  }
}
