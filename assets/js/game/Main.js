import { Game } from "./Game.js";
import { PlayerTwo } from "./components/PlayerTwo.js";
import { PlayerOne } from "./components/PlayerOne.js";
import { Sprite } from "./components/Sprite.js";
import { Screen } from "./components/Screen.js";
import { KeysListener } from "./components/KeysListener.js";
import { ChooseableOption } from "./components/ChooseableOption.js";
class Main {
  static async main() {
    const canvas = document.querySelector("canvas");
    const context = canvas.getContext("2d");
    const screen = new Screen();

    const background = new Sprite({
      imageSrc: "./assets/img/bg.gif",
      scale: 1.3,
    });

    const shop = new Sprite({
      position: {
        x: 700,
        y: 135,
      },
      imageSrc: "./assets/img/shop.png",
      scale: 2.5,
      maxFrames: 6,
    });

    const playerOne = new PlayerOne({
      name: "Player1",
      position: {
        x: -150,
        y: 576,
      },
      initialOrientation: "right",
      sprites: {
        idleLeft: new Sprite({
          imageSrc: "./assets/img/samuraiMack/IdleLeft.png",
          scale: 2.5,
          maxFrames: 8,
          offset: {
            x: 0,
            y: 43,
          },
        }),
        idleRight: new Sprite({
          imageSrc: "./assets/img/samuraiMack/IdleRight.png",
          scale: 2.5,
          maxFrames: 8,
          offset: {
            x: 0,
            y: 43,
          },
        }),
        runToRight: new Sprite({
          imageSrc: "./assets/img/samuraiMack/RunToRight.png",
          scale: 2.5,
          maxFrames: 8,
          offset: {
            x: 0,
            y: 43,
          },
        }),
        runToLeft: new Sprite({
          imageSrc: "./assets/img/samuraiMack/RunToLeft.png",
          scale: 2.5,
          maxFrames: 8,
          offset: {
            x: 0,
            y: 43,
          },
        }),
        attackLeft: new Sprite({
          imageSrc: "./assets/img/samuraiMack/Attack2Left.png",
          scale: 2.5,
          maxFrames: 6,
          offset: {
            x: 0,
            y: 43,
          },
        }),
        attackRight: new Sprite({
          imageSrc: "./assets/img/samuraiMack/Attack2Right.png",
          scale: 2.5,
          maxFrames: 6,
          offset: {
            x: 0,
            y: 43,
          },
        }),
        death: new Sprite({
          imageSrc: "./assets/img/samuraiMack/Death.png",
          scale: 2.5,
          maxFrames: 6,
          offset: {
            x: 0,
            y: 42,
          },
        }),
      },
    });

    const playerTwo = new PlayerTwo({
      name: "Player2",
      position: {
        x: 680,
        y: 576,
      },
      initialOrientation: "left",
      sprites: {
        idleLeft: new Sprite({
          imageSrc: "./assets/img/kenji/IdleLeft.png",
          scale: 2.5,
          maxFrames: 4,
          offset: {
            x: 0,
            y: 48,
          },
        }),
        idleRight: new Sprite({
          imageSrc: "./assets/img/kenji/IdleRight.png",
          scale: 2.5,
          maxFrames: 4,
          offset: {
            x: 0,
            y: 48,
          },
        }),
        runToRight: new Sprite({
          imageSrc: "./assets/img/kenji/RunToRight.png",
          scale: 2.5,
          maxFrames: 8,
          offset: {
            x: 0,
            y: 48,
          },
        }),
        runToLeft: new Sprite({
          imageSrc: "./assets/img/kenji/RunToLeft.png",
          scale: 2.5,
          maxFrames: 8,
          offset: {
            x: 0,
            y: 48,
          },
        }),
        attackLeft: new Sprite({
          imageSrc: "./assets/img/kenji/Attack1Left.png",
          scale: 2.5,
          maxFrames: 4,
          offset: {
            x: 0,
            y: 48,
          },
        }),
        attackRight: new Sprite({
          imageSrc: "./assets/img/kenji/Attack1Right.png",
          scale: 2.5,
          maxFrames: 4,
          offset: {
            x: 0,
            y: 48,
          },
        }),
        death: new Sprite({
          imageSrc: "./assets/img/kenji/Death.png",
          scale: 2.5,
          maxFrames: 7,
          offset: {
            x: 0,
            y: 48,
          },
        }),
      },
    });

    const game = new Game({
      canvas: canvas,
      context: context,
      screen,
      sprites: {
        players: { playerOne, playerTwo },
        scnearios: { background, shop },
      },
      topBarTimer: {
        start: 60,
        end: 0,
        currentValue: 60,
        element: document.querySelector(".timer span"),
        functionCallback: null,
      },
      gameOver: {
        value: false,
        element: document.querySelector(".gameOver"),
      },
      startTimer: {
        element: document.querySelector(".startTimer"),
        button: document.querySelector(".start button"),
      },
      KeysListener,
    });

    game.preloadGame();

    const getPlayersQuantity = new ChooseableOption({
      element: document.querySelector(".playersQuantity"),
      defaultValue: document.querySelector(".playersQuantity .choice").dataset
        .options,
      defaultIndex: 0,
    });

    const getDifficultyLevel = new ChooseableOption({
      element: document.querySelector(".difficultyLevel"),
      defaultValue: document.querySelector(".difficultyLevel .choice").dataset
        .options,
      defaultIndex: 1,
    });

    const startGameButton = new ChooseableOption({
      element: document.querySelector(".start"),
      defaultValue: document.querySelector(".start").dataset.options,
      defaultIndex: 0,
    });

    const options = {
      playersQuantity: 0,
      difficultyLevel: 0,
      victory: false,
      start: false,
      points: false,
    };

    getPlayersQuantity.showOptions();
    const handleOptions = async (e) => {
      if (options.playersQuantity === 0) {
        options.playersQuantity = await getPlayersQuantity.handleKeyPressed(e);
        if (options.playersQuantity === "1") getDifficultyLevel.showOptions();
        else
          startGameButton.showOptions(() => {
            document
              .querySelector(".tutorialTwoPlayers")
              .classList.add("activeBlock");
          });
        return;
      }
      if (options.playersQuantity === "1" && options.difficultyLevel === 0) {
        options.difficultyLevel = await getDifficultyLevel.handleKeyPressed(e);
        startGameButton.showOptions();
        document
          .querySelector(".tutorialOnePlayer")
          .classList.add("activeBlock");
        options.points = true;
        return;
      }

      options.start = await startGameButton.handleKeyPressed(e);
      window.removeEventListener("keydown", handleOptions);
      document.querySelector(".tutorial").classList.remove("activeFlex");
      game.startGame(options);
    };

    window.addEventListener("keydown", handleOptions);
  }
}

await Main.main();
