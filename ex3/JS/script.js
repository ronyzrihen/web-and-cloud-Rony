var audio = new Audio('JS/SOUNDEFFECT.mp3');
var currentDimentions = 80;
var flipedCard = undefined
var flipedLetter = undefined
var numOfCards = 0
var currentLetter = undefined

const getLetters = () => ['A', 'A', 'B', 'B', 'C', 'C', 'D', 'D', 'E', 'E', 'F', 'F', 'G', 'G', 'H', 'H']
var mached = getLetters().length / 2
var counter = 0
class Box {
    constructor(num) {
        this.width = num
        this.height = num

    }
    getWidth() {
        return this.width
    }
    getHeight() {
        return this.height
    }
    incWidth(num) {
        this.width += num
    }
    incHeight(num) {
        this.height += num
    }
}


function drawCards() {
    let letter
    let letters = getLetters()
    document.getElementById("btn").onclick = function() {

        numOfCards += 3
        let aBox = new Box(currentDimentions)
        if (letters.length == 0) {
            alert("Too Many Cards!")
            return
        }

        for (i = 0; i < 3; i++) {

            letter = getRandomChar(letters)
            if (letters.length == 0) {
                alert("Too Many Cards!")
                return
            }
            letter = letters[randomIndex]
            letters.splice(randomIndex, 1)

            let newCard = document.createElement("div")
            newCard.style.backgroundColor = "black"
            newCard.style.width = aBox.getWidth() + "px"
            newCard.style.height = aBox.getHeight() + "px"
            newCard.style.margin = "85px 60px"
            newCard.style.display = "flex"
            newCard.style.justifyContent = "center"
            newCard.style.alignItems = "center"
            newCard.style.borderRadius = "5px"
            aBox.incHeight(20)
            aBox.incWidth(20)
            currentDimentions += 20

            mainObj = document.getElementById("main1")
            mainObj.appendChild(newCard)

            let card = document.createElement("p")
            card.innerHTML = letter
            card.style.fontSize = "64px"
            card.style.fontFamily = "Amiko"
            card.style.visibility = "hidden"
            card.style.color = "white"
            newCard.appendChild(card)


            newCard.onclick = function() {

                if (card.style.visibility == "visible") {
                    return
                }
                card.style.visibility = "visible"
                if (flipedCard == undefined) {
                    flipedCard = this
                    flipedLetter = card
                    return
                }
                if (this.innerText == flipedCard.innerText) {
                    this.classList.add("mached")
                    flipedCard.classList.add("mached")
                    if (++counter == mached) {
                        wonGame()

                    }
                    flipedCard = undefined
                    return
                }
                currentLetter = card
                setTimeout(quickLoock, 250)
                flipedCard = undefined
                return
            }
        }
    }

}

function quickLoock() {
    flipedLetter.style.visibility = "hidden"
    currentLetter.style.visibility = "hidden"
}

function clickIndIcator() {
    let btn = document.getElementById("btn")
    btn.style.background = "black"

}

function getRandomChar(letters) {

    if (numOfCards > letters.length) {
        randomIndex = Math.floor(Math.random() * letters.length)
    } else {
        randomIndex = Math.floor(Math.random() * numOfCards)
    }
    return randomIndex

}

function wonGame() {
    audio.play()
    let reset = document.getElementById("newGame")
    reset.style.visibility = "visible"
    setTimeout(() => { location.reload() }, 7000)
}