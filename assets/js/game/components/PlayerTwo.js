import { Player } from "./Player.js";

export class PlayerTwo extends Player {
  constructor({
    position,
    initialOrientation,
    velocity,
    health = {
      element: document.querySelector(".playerTwo .playerHealth"),
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
      moveLeft: "ArrowLeft",
      moveRight: "ArrowRight",
      jump: "ArrowUp",
      attack: "Enter",
    };
  }
}
