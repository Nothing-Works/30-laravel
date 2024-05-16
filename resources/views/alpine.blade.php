<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div x-data="game()"
     class="px-10 flex items-center justify-center min-h-screen">
    <h1 class="fixed top-0 right-0 p-10 font-bold text-3xl">
        <span x-text="points"></span>
        <span class="text-xs">pts</span>
    </h1>
    <div class="flex-1 grid grid-cols-4 gap-10">
        <template x-for="card in cards">
            <div>
                <button
                    :style="'background: ' + (card.flipped ? card.color : '#999')"
                    class="h-32 w-full"
                    x-show="!card.cleared"
                    @click="flipCard(card)"
                >
                </button>
            </div>
        </template>
    </div>
</div>
<div x-data="{ show: false, message: 'Default message' }"
     x-show="show"
     x-text="message"
     @flash.window="
        message = $event.detail.message;
        show = true;
        setTimeout(() => show = false, 1000);
     "
     class="fixed bottom-0 right-0 bg-green-500 text-white p-2 mb-4 rounded"
>
</div>
<script>
    function pause(milliseconds = 1000) {
        return new Promise(resolve => setTimeout(resolve, milliseconds));
    }

    function flash(message) {
        window.dispatchEvent(new CustomEvent('flash', {
            detail: {message}
        }));
    }

    function game() {
        return {
            cards: [
                {color: 'green', flipped: false, cleared: false},
                {color: 'red', flipped: false, cleared: false},
                {color: 'blue', flipped: false, cleared: false},
                {color: 'yellow', flipped: false, cleared: false},
                {color: 'green', flipped: false, cleared: false},
                {color: 'red', flipped: false, cleared: false},
                {color: 'blue', flipped: false, cleared: false},
                {color: 'yellow', flipped: false, cleared: false},
            ].sort(() => Math.random() - .5),
            get flippedCards() {
                return this.cards.filter(c => c.flipped)
            },
            get clearedCards() {
                return this.cards.filter(c => c.cleared)
            },
            get remainingCards() {
                return this.cards.filter(c => !c.cleared)
            },
            get points() {
                return this.clearedCards.length
            },
            async flipCard(card) {
                if (this.flippedCards.length === 2) {
                    return;
                }
                card.flipped = !card.flipped;
                if (this.flippedCards.length === 2) {
                    if (this.hasMatch()) {
                        flash('You found a match!');
                        await pause();
                        this.flippedCards.forEach(c => c.cleared = true)
                        if (!this.remainingCards.length) {
                            alert('You won!');
                        }
                    }
                    await pause();
                    this.flippedCards.forEach(c => c.flipped = false)
                }
            },
            hasMatch() {
                return this.flippedCards[0].color === this.flippedCards[1].color
            }
        }
    }
</script>
</body>
</html>
