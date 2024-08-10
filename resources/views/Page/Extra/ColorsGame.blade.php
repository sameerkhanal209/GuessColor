<x-layout title="Color Guessing Game">
    <div class="container">

        <style>

            .game-container {
                display: flex;
                flex-direction: column;
                align-items: center;

                margin-top: 80px;
            }

            #gameBar {
                display: flex;
                justify-content: space-around;
                align-items: center;
                width: 50%;
                padding: 20px;
            }

            @keyframes goOnThenOff {
                0% {
                    opacity: 0;
                }

                60% {
                    opacity: 1;
                }

                100% {
                    opacity: 0;
                }
            }

            #answerStatus {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .whenRightAnswer {
                width: 35px;
                height: 35px;
                animation: goOnThenOff forwards .4s;
                fill: green;
            }

            .whenWrongAnswer {
                width: 35px;
                height: 35px;
                animation: goOnThenOff forwards .4s;
                fill: red;
            }

            .time,
            .round,
            .score {
                color: rgb(89, 89, 89);
                padding: 10px;
                font-size: 20px;
                font-weight: bold;
                display: flex;
                flex-direction: column;
                text-align: center;
            }

            span {
                padding: 5px
            }

            #colorToGuess {
                width: 100vw;
                height: 40vh;
                background-color: rgb(6, 120, 129);
            }


            #colorOptions {
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 20px;
                width: 100%;
            }

            .row {
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                padding-bottom: 25px;
            }


            .option {
                width: 100px;
                height: 100px;
                border-radius: 10px;
                margin: 10px;
                transition: all .2s;
            }

            .option:hover {
                cursor: pointer;
            }

            @keyframes growIn {
                0% {
                    opacity: 0;
                    transform: scale(0);
                }

                100% {
                    opacity: 1;
                    transform: scale(1);
                }
            }

            .result {
                display: flex;
                align-items: center;
                justify-content: center;
                position: fixed;

                top: 0;
                left: 0;
                bottom: 0;
                right: 0;

                width: 100%;
                height: 100%;

                background-color: rgba(47, 46, 46, 0.376);
            }

            .resultContainer {
                transition: all .2s;
                animation: growIn .3s forwards;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                width: 50vw;
                height: 50vh;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: rgb(29 28 28 / 23%) 0px 0px 20px 15px;
                text-align: center;
            }

            .resultText {
                display: flex;
                flex-direction: column;
                padding: 10px;
                font-size: large;
                font-weight: 700;

                margin-bottom: 30px;
            }

            .innerContainer {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
            }

            .percent {
                color: rgb(11, 109, 246);
            }

            .playAgain {
                text-align: center;
                margin-top: 10px;
                color: white;
                font-size: 20px;
                background-color: rgb(23, 21, 21);
                padding: 15px;
                border-radius: 10px;
                transition: all .2s;
            }

            .playAgain:hover {
                cursor: pointer;
                background-color: rgb(147, 233, 10);
                color: rgb(23, 21, 21);
            }

            .playAgain:active {
                transform: translateY(5px);
            }


            @media(max-width:700px) {
                #gameBar {
                    width: 70%;
                    padding: 15px;
                }

                .time,
                .round,
                .score {
                    padding: 7px;
                    font-size: 20px;
                }

                span {
                    padding: 4px;
                }

                .row {
                    padding-bottom: 15px;
                }

                .option {
                    width: 80px;
                    height: 80px;
                    border-radius: 5px 5px;
                    margin: 10px;
                }

                .resultContainer {
                    width: 60vw;
                }

                h1 {
                    font-size: 25px;
                }

                .playAgain {

                    margin-top: 10px;
                    font-size: 20px;
                    padding: 10px;
                    border-radius: 12px;

                }
            }

            @media(max-width:550px) {
                .row {
                    padding-bottom: 10px;
                }

                .option {
                    width: 60px;
                    height: 60px;
                    border-radius: 5px 5px;
                    margin: 7px;
                }
            }


            @media(max-width:550px) {
                .row {
                    padding-bottom: 7.5px;
                }

                .option {
                    width: 50px;
                    height: 50px;
                    border-radius: 25px 25px;
                    margin: 5px;
                }
            }

            @media(max-width:450px) {
                .resultContainer {
                    width: 75vw;
                }

                .innerContainer {
                    padding: 5px;
                }
            }

            @media(max-width:350px) {
                .row {
                    padding-bottom: 5px;
                }

                .option {
                    width: 40px;
                    height: 40px;
                    border-radius: 20px 20px;
                    margin: 3px;
                }
            }

            .play-popup{
                position: fixed;
                top:0;
                left:0;
                right:0;
                height: 100%;

                background-color: rgba(0,0,0,0.5);

                display: flex;
                align-items: center;
                justify-content: center;
                
            }

            .play-game-popup{
                padding: 50px;
                border-radius: 10px;
                background-color: #fff;

                max-width: 800px;
                overflow: auto;
            }

            .play-game-popup h1,
            .play-game-popup p,
            .play-game-popup button {
                margin: 30px 0;
            }

            .play-game-popup h1{
                color: #b24dcb;
            }

            @media screen and (max-height:600px),
            screen and (max-width: 600px)  {
                .play-popup{
                    align-items: normal;
                }
                .play-popup p{
                    font-size: 12px;
                }
                .play-game-popup{
                    padding: 80px 10px 0 10px;
                }
            }

        </style>

        <div class="game-container">

            <div class="play-popup">
                <div class="play-game-popup text-center box-shadow">
                    <h1>Play Color Guessing Game</h1>
                    <p>Welcome to GuessColor.com's color-guessing game. You will be shown color on the screen. You must choose the correct color from the options available. Simply click on the color you believe matches the one shown. Each correct answer will earn you points, the game will become more difficult as you progress. To win the game, you must correctly guess as many colors as possible.</p>
                    <button class="btn btn-fancy play-game" onclick="PlayGame()">Click to Play

                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-gamepad-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5h3.5a5 5 0 0 1 0 10h-5.5l-4.015 4.227a2.3 2.3 0 0 1 -3.923 -2.035l1.634 -8.173a5 5 0 0 1 4.904 -4.019h3.4z"></path>
                            <path d="M14 15l4.07 4.284a2.3 2.3 0 0 0 3.925 -2.023l-1.6 -8.232"></path>
                            <path d="M8 9v2"></path>
                            <path d="M7 10h2"></path>
                            <path d="M14 10h2"></path>
                        </svg>

                    </button>
                </div>
            </div>

            <div id="gameBar">
                <div class="time"><span>Time</span><span id="time"></span></div>
                <div class="round"><span>Round</span><span id="round"></span></div>
                <div class="score"><span>Score</span><span id="score"></span></div>
                <div id="answerStatus"></div>
            </div>
            <div id="colorToGuess"></div>
            <div id="colorOptions"></div>
        </div>

        <script>
            let round = 1;
            let score = 0;
            let time = 4.0;
            let correctColor = "";
            let colors = [];
            let options = document.querySelector('#colorOptions');
            let stopWatch;
            let skipped = 0;
            let attempted = 0;


            function reset() {
                round = 1;
                score = 0;
                time = 4.0;
                correctColor = "";
                colors = [];
                skipped = 0;
                attempted = 0;
            }

            // random color generator
            function getRandomColor() {
                const red = Math.floor(Math.random() * 256);
                const green = Math.floor(Math.random() * 256);
                const blue = Math.floor(Math.random() * 256);
                const hexValue = ((red << 16) | (green << 8) | blue).toString(16);
                const paddedHexValue = "000000".slice(hexValue.length) + hexValue;
                return "#" + paddedHexValue;
            }

            function colorExist(colorPool, color) {
                for (let i = 0; i < colorPool.length; i++) {
                    if (colorPool[i] === color) {
                        return true;
                    }
                }
                return false;
            }


            function generateColors(colorCount) {
                let colors = [];
                while (colors.length < colorCount) {
                    let newcolor = getRandomColor();
                    if (!colorExist(colors, newcolor)) {
                        colors.push(newcolor)
                    }
                }
                return colors;
            }

            function getColorRoundWise(round) {
                if (round <= 5) {
                    return generateColors(4);
                }
                if (round > 5 && round <= 10) {
                    return generateColors(6);
                }
                if (round > 10 && round <= 15) {
                    return generateColors(8);
                }
                if (round > 15) {
                    return generateColors(10);
                }
            }

            function shuffle(array) {
                for (let i = array.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [array[i], array[j]] = [array[j], array[i]];
                }
                return array;
            }

            function rgbToHex(rgbString) {
                const rgbValues = rgbString.match(/\d+/g);
                const r = parseInt(rgbValues[0]);
                const g = parseInt(rgbValues[1]);
                const b = parseInt(rgbValues[2]);
                const hexR = r.toString(16).padStart(2, '0');
                const hexG = g.toString(16).padStart(2, '0');
                const hexB = b.toString(16).padStart(2, '0');
                return `#${hexR}${hexG}${hexB}`;
            }


            let whenRightAnswer =
                `<svg class="whenRightAnswer" viewBox="0 0 512 512"><path d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>`;
            let whenWrongAnswer =
                `<svg class="whenWrongAnswer" viewBox="0 0 320 512"><path d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"/></svg>`;

            function checkAnswer() {
                attempted++;
                document.querySelector("#round").innerHTML = round;
                if (correctColor === rgbToHex(this.style.backgroundColor)) {
                    // increase the score
                    document.querySelector("#answerStatus").innerHTML = whenRightAnswer;
                    score++;
                    document.querySelector("#score").innerHTML = score;
                } else {
                    document.querySelector("#answerStatus").innerHTML = whenWrongAnswer;
                }
                // go to next round
                clearInterval(stopWatch)
                round++;
                setGameScene();
            }

            function drawOptions(chosenColor) {
                if (options.children.length >= 2) {
                    while (options.firstChild) {
                        options.removeChild(options.firstChild);
                    }
                }

                let row1 = document.createElement('div');
                row1.classList.add('row')
                let row2 = document.createElement('div');
                row2.classList.add('row')

                for (let j = 0; j < colors.length; j++) {
                    if (j % 2 == 0) {
                        let option = document.createElement('div');
                        option.classList.add('option')
                        option.style.backgroundColor = colors[j];
                        option.onclick = checkAnswer;
                        row1.append(option);
                    } else {
                        let option = document.createElement('div');
                        option.classList.add('option')
                        option.style.backgroundColor = colors[j];
                        option.onclick = checkAnswer;
                        row2.append(option);
                    }
                }
                options.append(row1, row2);


            }

            function chosenColor(colors) {
                let x = Math.floor((Math.random() * (colors.length - 1)));
                return colors[x];
            }

            function setColorToGuess(color) {
                let colorToGuess = document.querySelector("#colorToGuess");
                colorToGuess.style.backgroundColor = color;
            }

            function displayResult() {

                let result = document.createElement('div');
                let resultContainer = document.createElement('div');
                resultContainer.classList.add("resultContainer");

                let h1 = document.createElement('h1');
                let accr = (score / (round - 1)) * 100;
                h1.innerHTML = `Your Accuracy is <span class="percent" >${accr.toFixed(2)}%</span>`;

                let innerContainer = document.createElement("div");
                innerContainer.classList.add("innerContainer");

                let resultText = document.createElement('div');
                resultText.classList.add('resultText');

                let atp = document.createElement('div');
                let skp = document.createElement('div');
                let crrt = document.createElement('div');
                let ttl = document.createElement('div');

                atp.innerHTML = `Attempted : ${attempted}`;
                skp.innerHTML = `Skipped   : ${skipped}`;
                crrt.innerHTML = `Correct   : ${score}`;
                ttl.innerHTML = `Total     : ${round - 1}`;
                resultText.append(atp, skp, crrt, ttl);

                let playAgain = document.createElement('div');
                playAgain.addEventListener('click', playAgn);
                playAgain.innerHTML = `
                <button class="btn btn-fancy play-game">Play Again

                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-gamepad-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 5h3.5a5 5 0 0 1 0 10h-5.5l-4.015 4.227a2.3 2.3 0 0 1 -3.923 -2.035l1.634 -8.173a5 5 0 0 1 4.904 -4.019h3.4z"></path>
                        <path d="M14 15l4.07 4.284a2.3 2.3 0 0 0 3.925 -2.023l-1.6 -8.232"></path>
                        <path d="M8 9v2"></path>
                        <path d="M7 10h2"></path>
                        <path d="M14 10h2"></path>
                    </svg>

                </button>
                `

                innerContainer.append(resultText, playAgain);

                resultContainer.append(h1, innerContainer);
                result.append(resultContainer);
                result.classList.add("result");
                document.querySelector("body").append(result);




            }

            function removePopUp() {
                document.querySelector('.result').remove();
            }


            function setGameScene() {
                if (round > 20) {
                    displayResult();
                    clearInterval(stopWatch);
                    time = 4.0;
                    score = 0;
                    round = 1;
                } else {
                    time = 4.0;
                    document.querySelector("#round").innerHTML = round;
                    document.querySelector('#score').innerHTML = score;

                    stopWatch = setInterval(() => {
                        time -= .1;
                        document.querySelector("#time").innerHTML = time.toFixed(2);
                        if (time <= 0) {
                            clearInterval(stopWatch);
                            document.querySelector("#time").innerHTML = 0;
                            round++;
                            skipped++;
                            setGameScene();
                        }
                    }, 50);
                    colors = shuffle(getColorRoundWise(round));
                    correctColor = chosenColor(colors);
                    setColorToGuess(correctColor);
                    drawOptions(correctColor);
                }

            }


            function playAgn() {
                removePopUp();
                reset();
                setGameScene();
            }

            function PlayGame(){
                document.querySelector(".play-popup").style.display = "none";
                setGameScene();
            }


        </script>

    </div>
</x-layout>
