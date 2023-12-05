        
        $(document).ready(function () {
            // Traffic signs data
            const signs = [
                { src: 'speed.png', correctOption: 3 },
                { src: 'closed.jpg', correctOption: 0 },
                { src: 'FALLINGrocks.png', correctOption: 1 },
                { src: 'NoOver.jpg', correctOption: 4 },
                { src: 'Nou.jpg', correctOption: 2 }
                // Add more signs as needed
            ];

            // Current sign index
            let currentSignIndex = 0;
            // Counter for correct answers
            let correctAnswers = 0;

            // Function to initialize the game
            function initializeGame() {
                showRandomSign();
            }

            // Function to show a random traffic sign
            function showRandomSign() {
                const sign = signs[currentSignIndex];
                $('#traffic-sign').attr('src', sign.src);
            }

            // Function to check the selected option
            $('button[data-option]').on('click', function () {
                const selectedOption = parseInt($(this).data('option'));
                const sign = signs[currentSignIndex];
                const resultElement = $('#result');
                const playAgainButton = $('#play-again');

                if (selectedOption === sign.correctOption) {
                    resultElement.text('Correct! ').addClass('green');
                    correctAnswers++;
                } else {
                    resultElement.text('Incorrect. ').addClass('red');
                }

                // Move to the next sign
                currentSignIndex = (currentSignIndex + 1) % signs.length;

                // Show the final result if all questions are answered
                if (currentSignIndex === 0) {
                    setTimeout(function () {
                        showFinalResult();
                        playAgainButton.show();
                    }, 1500);
                } else {
                    // Show the next sign after a short delay
                    setTimeout(function () {
                        showRandomSign();
                        resultElement.text('').removeClass();
                    }, 1500);
                }
            });

            // Function to show the final result
            function showFinalResult() {
                const resultElement = $('#result');
                resultElement.text(`You answered ${correctAnswers} out of ${signs.length} questions correctly.`)
                    .addClass('green');
            }

            // Function to play again
            $('#play-again').on('click', function () {
                currentSignIndex = 0;
                correctAnswers = 0;
                initializeGame();
                resultElement.text('').removeClass();
                $(this).hide();
            });

            // Initialize the game when the page loads
            initializeGame();
        });