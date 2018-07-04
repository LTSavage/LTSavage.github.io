<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KM &mdash; Connect 4 AI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A portfolio showing the work of myself, Kieran Molloy, in my endeavour to become a full stack developer" />
    <meta name="keywords" content="Kieran, Molloy, Kieran Molloy, Portfolio, Developer" />
    <meta name="author" content="Kieran Molloy" />

    <!-- 
	//////////////////////////////////////////////////////

    Title : Personal Website for Kieran Molloy
    Author : Kieran Molloy
    Date : 29/05/2018
    Page : Connect 4 AI

	//////////////////////////////////////////////////////
	 -->

    <!-- Styles and Scripts -->
    <?php include('../../imports/StylesScripts/-2.html'); ?>

</head>

<body>

    <!-- Loader -->
    <div class="wb1-loader"></div>

    <!-- Home + Blog Logo -->
    <?php include('../../imports/logo.html'); ?>
    
    <div id="wb1-main" role="main">

        <div class="container">



            <div class="row">
                <div class="col-md-8 wb1-heading">
                    <h1>Connect 4 AI?</h1>
                    <p>This project is what I did for my A Level Computer Science course, I chose it because of a joke with a friend at the time and thought it would a fun project. Then realised the depth of the project, and my opinion swung. It really pushed me to the best of ability and I pulled out all the stops to complete it. The base of the AI is similar to that used in the Tic-Tac-Toe which is minimax with alpha-beta pruning for better efficiency. However since Tic-Tac-Toe only has 5812 possible board states, and connect 4 has roughly <a href='https://oeis.org/A212693'>4531985219092</a>. This is a very significant difference, the difference between a 30ms calculation time and 30s calculation time.</p>

                </div>
            </div>

            <div class="wb1-grid">

                <div class="wb1-col-2">


                </div>
                <div class="wb1-col-1">
                    <div class="wb1-heading padding-right">
                        <ol>
                            <li><a href="#DesignPhase">Design Phase</a></li>
                            <ol>
                                <li><a href="#Objectives">Objectives</a></li>
                                <li><a href="#Coming up with the layout">Coming up with the layout</a></li>
                                <li><a href="#Designing Pseudo-Code">Designing Pseudo-Code</a></li>
                                <li><a href="#Initial Algorithm Design">Initial Algorithm Design</a></li>
                            </ol>
                            <li><a href="#Programming">Basic Programming</a></li>
                            <ol>
                                <li><a href="#Basic Connect 4">Basic Connect 4</a></li>
                                <li><a href="#Creating AI">Creating AI</a></li>
                                <li><a href="#AI Walkthrough">AI Walkthrough</a></li>
                                <li><a href="#SaveLoad">Adding Saving/Loading</a></li>
                            </ol>
                            <li><a href="#">Testing</a></li>
                            <ol>
                                <li><a href="#">Video Tests</a></li>
                                <li><a href="#">Variable Tests</a></li>
                                <li><a href="#">Some Other Tests</a></li>
                            </ol>
                        </ol>
                    </div>
                </div>



                <div class="wb1-heading padding-right">
                    <h2 id="DesignPhase">Design Phase</h2>
                    <h3 id="Objectives">Objectives</h3>
                    <p>I set out to create a simple connect 4 game using windows forms.</p>
                    <ol style="1">
                        <li>You can drop a tile by clicking the column</li>
                        <li>The menu must be have good usability</li>
                        <li>Save and Load options</li>
                        <li>Incorporate Colour</li>
                        <li>Player customisation i.e custom RGBA colours</li>
                        <li>Advanced AI - read the board, decide which move is best, act on decision</li>
                        <li>Leaderboard with Radix LSD sort</li>

                    </ol>
                </div>

                <div class="wb1-heading padding-right-images">
                    <style>
                        .rotate90 {
                            display: inline-block;
                            height: 20em;
                            width: 22.5em;
                        }
                        .left {
                        float: left;
                        }
                        
                        .right {
                        float:right;
                        }
                        

                    </style>
                    <h3 id="Coming up with the layout">Coming up with the layout</h3>
                    <p>As stated with my 2nd target, I want the menu's to be easy to use. With that, here are the early stage designs for what the application will look like</p> 
                    <img src="images/mainMenu.jpg" class="rotate90 left">
                    <p>This image shows an initial design of the main menu, I want the menu to have minimal options to avoid confusion, I also want a quick game option. In the image it is 'Player v Player'. This immediatley creates a PvP game instead of going through New Game which will bring up 2 other menu's to then create the game. Load game does what it says on the tin, it opens the load game form where you can select a file or select one of the previous 5 games, preview it to see if it is your game and then load or search for file again. Help will store a tutorial mode where a user can be given an easy walkthrough of the game.</p>
                    <img src="images/gameBoard.jpg" class="rotate90 right"> 
                    <p>This image shows an initial design of the game screen. This is where the magic happens, this is the main screen for the game. The game board is comprised of 3 main parts - Taskbar, Game Panel and Info Panel. The taskbar gives a simplistic menu, that most people who have a computer are familiar with and so adds no complexity to the project. The playing area is as simple as comes, it is a 7x6 grid where you can play connect 4 pieces. The clicks are only column dependant. In the Info Panel it is further broken into 4 parts - Score, Players, Game, Time. So score gives a score based on the board position, calculated on how many 3's,2's,2's (where 3's means 3 consecutive tiles) you have compared to the opponent. Players gives a colour representation of which piece you are, if you decided for an obscure colour or you forget which colour you are, it will also state your username below that. If it is a player v player game it will have both username, the computer is just called PlayerX (1 or 2). Game gives us statistics about the game, such as who's turn, number of turns and game status. Time is where Turn time and game time are stated. Turn time is the time taken on the current turn, game time is the sum of all turn times. </p>
                    <img src="images/saveGame.jpg" class="rotate90 left"> 
                    <p>This image shows an initial design of the Save Game form. It will be a simple windows explorer form. It will automatically set the file path as the saveDefaultPath in the settings, by default when the program is installed it creates a path where all unsaved files will be kept for the recently played function to work. In the save game it will also keep meta data about the file such as who is playing, what turn number, who's turn, game time, turn time and game state (Win, Loss, Draw, None). To do this I will use a simple text file to allow for easy game manipulation. (Note: I use this instead of binary because of testing purposes later on, this became a saviour to testing the MiniMax) </p>
                    <img src="images/loadGame.jpg" class="rotate90 right"> 
                    <p>This image shows an initial design of the Load Game form.  It is very similar to the save game form except for the recent games panel. It is mainly a windows explorer form to find any file. Because of my choice of using a text file to store game saves, it could make the loader fragile and prone to crashing, but there are a couple error checks to validate that the file is good for loading. Then there is the recent games panel, this panel shows the 5 most recent games based on system time, it will only show unfinished games. If any other games are highlighted it will replace the oldest game of the 5, and be put at the top of the list with an asterisk. After a file is selected you are taken to a form, similar to a mini version of the game board and it shows a preview of the file you are trying to load, and also shows the game meta data. If this is the correct file, you press load and it gets loaded into the main game screen, or you can select another file. </p>
                    <img src="images/about.jpg" class="rotate90 left"> 
                    <p>This image shows an initial design of the about screen. This simply gives information about build number and author, it also states that this project is for educational purposes and that any bugs can be reported to my GitHub page, however are unlikely to fixed as it is just a coursework exercise. However if you have any ideas to discuss <a href = "mailto:kieran.b.molloy@outlook.com">kieran.b.molloy@outlook.com</a> </p>
                    <img src="images/help.jpg"class="rotate90 right">
                    <p>This image shows an initial design of the help screen. This help screen demonstrates how you play the game, and how to use each of the game functions. It is fairly self explanatory</p>
                    
                </div>

                <div class="wb1-heading padding-right">
                    <h3 id="Designing Pseudo-Code">Designing Pseudo-Code</h3>
                    <p>Here are 8 algorithms that are used within my Connect 4 game, this pseudo code will outline what I intend the algorithms to do by the final iteration of the game. The pseudo code for the Mini-Max isnt here, it has its own section <a href="#">here</a>.</p>
                    <h4>PlayGame()</h4>
                    <p><script src="https://gist.github.com/LTSavage/046fe4b06d67e9132935229f4da9c21b.js"></script>This algorithm is the brain of the game, the centre of the call stacks. This algorithm makes sure that the game runs as intended. The algorithm makes a player take their turn, check for a win, updates the board then make the other player have a turn, and then check for a win, and then updates the board and loops that until a winner is found.  Upon a winner being found, it is directed to another procedure which handles the game upon winning. This core element to the game is kept very modular, I've done this to keep the program clean and to reduce redundant code.</p>
                    <h4>SetupBoard()</h4>
                    <p><script src="https://gist.github.com/LTSavage/0e8742127342f39e96565c696a83918f.js"></script>This algorithm makes sure that the board is logically set up correctly for full functionality, as physically the labels are all already in position  It runs a loop for all label on the board (I will use labels to represent each tile on the connect 4 board), the names are left as label1-42, which is bad practice as it does not show what the purpose of the label is. However my SetupBoard algorithm requires them in this format so that they can be processed into game logic, because of this, the order that the labels are positioned is very important. My algorithm replaces the name of the label, so label34, with just 34. Then there is a nested For loop so that the program can work out which row the current label is situated on, then it works out which column it is in. Upon doing this the row and column are both added to the labels tag so that the information can be accessed at all times.</p>
                    <h4>Move()</h4>
                    <p><script src="https://gist.github.com/LTSavage/ff2aa8b37b4b8aafab136f09517ac83d.js"></script>This function deals with player moves and computer moves, it is what is called when the board is updated with a new move. But before adding the new move to the board it clones the current state, and checks to see if the column is full so to prevent overflow errors. If it is full then it returns 0, to prevent the system crashing, but if it passes the check then the newly cloned state becomes state.</p>
                    <h4>CheckWin()</h4>
                    <p><script src="https://gist.github.com/LTSavage/d51088b95d523e9e94bfed9c04f9982c.js"></script>The purpose of this function is to send values to be examined for a win, it loops through the whole board (horizontal, then vertical, then both diagonals) sending values of 4 tiles at a time to be examined for a win.</p>
                    <h4>CheckLine() #1 </h4>
                    <p><script src="https://gist.github.com/LTSavage/709499e9ddafb4fceed4725a5db700bd.js"></script>This function is simply to check whether player1 or player2 has 4 consecutive pieces, if they do they’ve won, so either 1 or 2 is returned depending on who has the winning move. When passing values into the CheckLine function I will use a ParamArray due to the fact that I want to use the same function with a different number of values depending on what I need to check. So when evaluating the horizontal I pass in 7 values, but for the vertical only 6 are passed in. Usually this would cause problems, but because they are passed in using a ParamArray this problem is avoided.</p>
                    <h4>CheckLine() #2</h4>
                    <p><script src="https://gist.github.com/LTSavage/c6ed639c5c7349ffd57050652de40e8a.js"></script>This function is the core algorithm to score the Ai’s turns. It calculates a score for the values passed in and outputs that. Score is only changed when there are only pieces of one type in the current evaluation region (of size 4). When a computer has its pieces only it adds score, when a player has its pieces only it decreases score. When passing values into the CheckLine function I will use a ParamArray due to the fact that I want to use the same function with a different number of values depending on what I need to check. So when evaluating the horizontal I pass in 7 values, but for the vertical only 6 are passed in. Usually this would cause problems, but because they are passed in using a ParamArray this problem is avoided.</p>
                    <h4>Save Game()</h4>
                    <p><script src="https://gist.github.com/LTSavage/a4378cc45bd6995587d6506903434e4e.js"></script>This function saves the current state as a text file and is saved to any desired location of the user. It includes all the required information to be loaded back up and continue the game at a later date.</p>
                    <h4>Load Game()</h4>
                    <p><script src="https://gist.github.com/LTSavage/8dfe50e2eedf7c92dfdef7ebba4ba5b2.js"></script>This function is far more complex than the save game, and requires validation, it reads the information line by line into a list where it is validated then extracted in separate functions to create all the required information and load up a previous game</p>
                </div>

                <div class="wb1-heading padding-right">
                    <h3 id="Initial Algorithm Design">Initial Algorithm Design</h3>
                    <h4 id="Play Game">Play Game</h4>
                    <p><script src="https://gist.github.com/LTSavage/ca6c1464caacf9e79dee89db3b263777.js"></script>This is the brain of the game. At the bottom of the snippet there is the initialisation where a new <a href="#StateType">StateType</a> is created. Along with this Player1 and Player2 are created. These are essetially pointers to an <a href="#IPlayer">IPlayer</a> type. This allows the game to create PvP, PvC, CvC using the exact same code. PlayGame() is the main function of connect 4, and is the bottom of the call stack the main part It comes down to the loop (lines 24-52) where it just loops player 1 then player 2 move. The player to make a move is tracked in State.Turn, where 1 is player1 to make a move, 2 is player2 to move. Then the Move Function calls <a href="#StateType">State.Move</a> with the intended column to play. This is repeated until an ultimate state is found, whether that be Player 1 Wins, Player 2 Wins, or Draw. Each loop the current state runs a <a href="#Check Win">CheckWin</a></p>
                    <h4 id="Scoring Algorithm">Scoring Algorithm</h4>
                    <p><script src="https://gist.github.com/LTSavage/531b5d37349b3ef674fc6561078afc8a.js"></script>The above algorithm is what will be used to score the final game of connect 4. The function Eval(state(,)) will be called to evaluate the current board, this function goes through every 4 adjacent cells calling CheckLine for each of them. Checkline is where the number of player pieces are counted and the number of computer pieces are counted. If there are &gt;0 computer pieces and 0 player pieces, this is considered a possible win for the computer. The number of consecutive pieces indicate how strong the possible win is (i.e, 4=already won, 3=1 move from winning), the weights I use reflect this (At the top of the snippet). When calculating the value of a board, both the computer's possible moves and the players possible moves must be considered. Therefore we need to make the AI know that the player getting close to Connecting 4 is very very bad, I decided to make the AI defensive, so it considers the player making progress worse than it making progress, unless it see's a clear chance of winning. The first 4 weights are used for the AI, the last 4 are used for the player. The AI weights are added to score, the Player weights are negated from score. (Special Case: If either computer/user wins the function immediatley returns the 4/8 weight, because it is obviously pointless to carry on) Once all possible 4 adjacent tiles combinations have been checked the total score is returned. This is the value of the state.</p>
                    <h4 id="Setup Board">Setup Board</h4>
                    <p><script src="https://gist.github.com/LTSavage/7ee2ebc28195beb146d74f013157b858.js"></script>This in short filters out all the labels not in the main interface, so that any labels that are not part of the 7x6 game board are not modified, the algorithm calculates which row/column it is in and assigns it to the labels tag. To get the row, it is simply the i value of the for loop, if it complies with the if statement (only 1 i value will satisify). The column is harder, as I use the value in the labels name (which is just the default name, and as more are made it is incremented). I use these two formulas to calculte Row and Column because they are both fool proof methods of getting the row and columns.</p>
                    <h4 id="Save Game">Save Game</h4>
                    <p><script src="https://gist.github.com/LTSavage/f66d20ce6e049e229648b3224e5e7234.js"></script>Saving a file is fairly straight forward. The file gets selected using a SaveFileDialog, then file is opened. The nested loop goes through each board value (0,1,2). Then writes other Meta information about the game below it and closes the file.</p>
                    <h4 id="Load File">Load File</h4>
                    <p><script src="https://gist.github.com/LTSavage/2822fa39fb6a025d405bb3762c0983fc.js"></script>Loading a file is far less straight forward. Again the file gets selected using a OpenFileDialog, once the filename is decided the function LoadGameFile peeks at the each character until its -1 adding each value to a list of type integers. This list is then organised into the board and meta. (Board(,), RowCounts(), MoveCount, Turn, GameType. A <a href="#StateType">StateType</a> is created to store all the information. All the information is pushed to label text values (this is just visual aspects).</p>
                    <h4 id="Check Win">Check Win</h4>
                    <p><script src="https://gist.github.com/LTSavage/88f1308b0ccdea04e40fdbf0fa07fe48.js"></script>Check Win is very similar to the scoring algorithm is in the sense that there is a larger calling algorithm with a smaller algorithm doing the leg work. CheckWin goes through every possible 4 adjacent tile combination and sends the values to CheckLine. In CheckLine there could be 4-7 values sent into it, so I used ParamArray to allow for this variable input. It simply counts the number of adjacent same-value tiles, and if anywhere exits 4 adjacent tiles then a winner exists, and the value (either 1 or 2, 1 if player 1 has 4 adjacent tiles, 2 if player 2 has 4 adjacent tiles) is passed back to CheckWin, and since r will not equal 0, it is returned and a winner declared in PlayGame()</p>
                    <h4 id="StateType">StateType</h4>
                    <p><script src="https://gist.github.com/LTSavage/aee750aa8d4f06feb618e5df1e7e3920.js"></script>The statetype class is how the game knows what it is. It stores the board, RowCounts, Who's turn, State Value, Moves made, Successors (more on that below) and GameType (PvP,PvC,CvC). This class is initialised as an empty board matrix, with empty RowCounts and MoveCount set to 0. This is where the other Move function lies, the one that actually does the moving logic. So it creates a clone of the curent state (so we dont ruin anything), then we do some number manipulating where we convert the column chosen to 0-based arrays and make sure the column is not full, if it isnt full, then we increment it (as we are playing in that column) and the main board is updated and who's turn is swapped and the new statetype is returned.<br>Successors is a Dictionary of Integers, and StateType. The integers are 0 to 6, and the StateType is the related StateType where the next move is played in the integer values column. This allows us to process the MiniMax slightly faster.  </p>
                    <h4 id="IPlayer">IPlayer</h4>
                    <p><script src="https://gist.github.com/LTSavage/6e0c36ca6cb5538052d8c8ae6386b176.js"></script> IPlayer is the player object, it represents a user that can take a turn. I implemented it as an interface. </p>
                </div>
                <div class="wb1-heading padding-right">
                    <h3 id="Programming">Programming</h3>
                    <h4 id="Basic Connect 4">Basic Connect 4</h4>
                    
                </div>


            </div>

            <!-- Adding Social Footer -->
            <?php include('../../imports/social.html');?>
        </div>
    </div>


</body>

</html>
