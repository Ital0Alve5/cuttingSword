import { Player } from "./Player.js";

export class PlayerOne extends Player {
  constructor({
    position,
    initialOrientation,
    velocity,
    health = {
      element: document.querySelector(".playerOne .playerHealth"),
      widthInPercent: 100,
    },
    hitPower,
    attackBox,
    name,
    offset,
    sprites,
  }) {
    super({
      position,
      initialOrientation,
      velocity,
      health,
      hitPower,
      attackBox,
      name,
      offset,
      sprites,
    });
    this.keysListened = {
      moveLeft: "KeyA",
      moveRight: "KeyD",
      jump: "KeyW",
      attack: "Space",
    };
  }
}
