<html>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''>
    <meta name='author' content=''>
    <link rel='icon' href='../../favicon.ico'>

    <title>My Progress Stat</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>

  <body>

    <nav class='navbar navbar-expand-lg navbar-dark bg-dark' style="padding-right: 5em;">
        <a class='navbar-brand' href='http://jpromano.net'>Jpromano.net</a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarColor03' aria-controls='navbarColor03' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
      
        <div class='collapse navbar-collapse' id='navbarColor03'>
          <ul class='navbar-nav ml-auto'>
            <li class='nav-item active'>
              <a class='nav-link' href='http://stats.jpromano.net'>Home <span class='sr-only'>(current)</span></a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='./codingStats.php'>Coding</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='./studyStats.php'>Study</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='./readingStats.php'>Reading</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='./blogStats.php'>Blog</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Workout
              </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="./runningStats.php">Running</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="./wlStats.php">Weight Loss</a>
                </div>
            </li>
          </ul>
        </div>
    </nav>
    <div class="bg-light" style="max-width: 100%; height: 15rem; padding: 1em 3em 1em 3em;">
        <center>
            As i am a freak about metrics and continuous improvement, i made this little side project to keep track of the stuff i'm into like how many hours i code, how many commits i do, how many pages i read and for how many hours, etc.
            <br>
            <br>
            <p>
                Also you could <b>follow me</b>, here:
            </p>
            <p>
                <a href="https://github.com/jpromanonet" target="_blank">Github</a> |
                <a href="https://www.linkedin.com/in/juan-pablo-romano-7919b1127/" target="_blank">Linkedin</a> |
                <a href="https://medium.com/@jpromanonet" target="_blank">Medium</a> |
                <a href="https://www.instagram.com/juanp.raven/" target="_blank">Instagram</a> 
            </p>
        </center>
    </div>
    </br>
    <div class='container'>
        <h1>Coding</h1>
        <div class='row'>
            <div class='col-md'>
       
                <div class='card text-white bg-success mb-3' style='max-width: 100%;'>
                    <div class='card-header'>Total Coding Time</div>
                        <div class='card-body'>
                            <?php
                                include('connectDataBase.php');

                                $sqlTotalTime = "SELECT FLOOR(SUM(codingHours)) AS 'totalTime'
                                                    FROM cs_CodingHours";
                                                     
                                $res = $conn->query($sqlTotalTime);
                                $res->num_rows > 0;
                                $row = $res->fetch_array();

                                echo "<center><h1 class='card-title'>".$row['totalTime']." Hs</h1></center>";

                                $conn->close(); 
                            ?> 
                        </div>
                </div>

            </div>
        
            <div class='col-md'>

                <div class='card text-white bg-success mb-3' style='max-width: 100%;'>
                    <div class='card-header'>Total Commits on GitHub</div>
                        <div class='card-body'>
                            <?php
                                include('connectDataBase.php');

                                $sqlTotalCommits = "SELECT SUM(dailyCommits) AS 'totalCommits'
                                                    FROM cs_CodingHours";
                                                     
                                $res = $conn->query($sqlTotalCommits);
                                $res->num_rows > 0;
                                $row = $res->fetch_array();

                                echo "<center><h1 class='card-title'>".$row['totalCommits']."</h1></center>";

                                $conn->close(); 
                            ?> 
                        </div>
                </div>

            </div>

            <div class='col-md'>

                <div class='card text-white bg-success mb-3' style='max-width: 100%;'>
                    <div class='card-header'>Hottest Language Now</div>
                        <div class='card-body'>
                            <?php
                                include('connectDataBase.php');

                                $sqlMostUsedLang = "SELECT MAX(dayLanguage) AS 'totalLang', 
	                                                            FLOOR(SUM(codingHours)) as 'totalHours'
       		                                                        FROM cs_CodingHours
            	                                                        WHERE codingHours != 1307
        			                                                        GROUP BY dayLanguage
                                                                                ORDER BY totalHours DESC
                                                                                    LIMIT 1";
                                                     
                                $res = $conn->query($sqlMostUsedLang);
                                $res->num_rows > 0;
                                $row = $res->fetch_array();

                                echo "<center><h1 class='card-title'>".$row['totalLang']."</h1></center>";

                                $conn->close(); 
                            ?> 
                        </div>
                </div>

               </div>
        
        </div>
    </div><!-- /container -->
    </br>
    <div class='container'>
        <h1>Study</h1>
        <div class='row'>
            <div class='col-md'>
       
                <div class='card text-white bg-primary mb-3 h-100' style='max-width: 100%;'>
                    <div class='card-header'>Total Study Time</div>
                        <div class='card-body'>
                            <?php
                                include('connectDataBase.php');

                                $sqlTotalTime = "SELECT FLOOR(SUM(studyHours)) AS 'totalTime'
                                                    FROM st_General";
                                                     
                                $res = $conn->query($sqlTotalTime);
                                $res->num_rows > 0;
                                $row = $res->fetch_array();

                                echo "<center><h1 class='card-title'>".$row['totalTime']." Hs</h1></center>";

                                $conn->close(); 
                            ?> 
                        </div>
                </div>

            </div>
        
            <div class='col-md'>

                <div class='card text-white bg-primary mb-3 h-100' style='max-width: 100%;'>
                    <div class='card-header'>First Subject Now</div>
                        <div class='card-body'>
                            <?php
                                include('connectDataBase.php');

                                $sqlFirstSubject = "SELECT MAX(studySubject) AS 'firstSubject', 
	                                                         FLOOR(SUM(studyHours)) as 'totalHours'
       		                                                    FROM st_General
        			                                                  GROUP BY studySubject
                                                                        ORDER BY totalHours DESC
                                                                            LIMIT 1";
                                                     
                                $res = $conn->query($sqlFirstSubject);
                                $res->num_rows > 0;
                                $row = $res->fetch_array();

                                echo "<center><h4 class='card-title'>".$row['firstSubject']."</h4></center>";

                                $conn->close(); 
                            ?> 
                        </div>
                </div>

            </div>
        </div>
    </div><!-- /container -->
    </br>
    <div class='container'>
        <h1>Reading</h1>
        <div class='row'>
            <div class='col-md'>
       
                <div class='card text-white bg-info mb-3 h-100' style='max-width: 100%;'>
                    <div class='card-header'>Total Reading Time</div>
                        <div class='card-body'>
                            <?php
                                include('connectDataBase.php');

                                $sqlTotalTime = "SELECT FLOOR(SUM(tiempoLectura)) AS 'totalTime'
                                                    FROM rd_General";
                                                     
                                $res = $conn->query($sqlTotalTime);
                                $res->num_rows > 0;
                                $row = $res->fetch_array();

                                echo "<center><h1 class='card-title'>".$row['totalTime']." Hs</h1></center>";

                                $conn->close(); 
                            ?> 
                        </div>
                </div>

            </div>
        
            <div class='col-md'>

                <div class='card text-white bg-info mb-3 h-100' style='max-width: 100%;'>
                    <div class='card-header'>Total Read Pages</div>
                        <div class='card-body'>
                            <?php
                                include('connectDataBase.php');

                                $sqlTotalPages = "SELECT SUM(paginasLeidas) AS 'totalPages'
                                                    FROM rd_General";
                                                     
                                $res = $conn->query($sqlTotalPages);
                                $res->num_rows > 0;
                                $row = $res->fetch_array();

                                echo "<center><h1 class='card-title'>".$row['totalPages']."</h1></center>";

                                $conn->close(); 
                            ?> 
                        </div>
                </div>

            </div>

            <div class='col-md'>

                <div class='card text-white bg-info mb-3 h-100' style='max-width: 100%;'>
                    <div class='card-header'>Longest Book until now</div>
                        <div class='card-body'>
                            <?php
                                include('connectDataBase.php');

                                $sqlMaxBook = "SELECT nombreLibro AS 'maxBook'
	                                              FROM rd_General
                                                  	WHERE paginasTotales IN 
                                                      	(SELECT MAX(paginasTotales)
                                                           	FROM rd_General)";
                                                     
                                $res = $conn->query($sqlMaxBook);
                                $res->num_rows > 0;
                                $row = $res->fetch_array();

                                echo "<center><h4 class='card-title'>".$row['maxBook']."</h4></center>";

                                $conn->close(); 
                            ?> 
                        </div>
                </div>

               </div>
        
        </div>
    </div><!-- /container -->
    </br>
    <div class='container'>
        <h1>Blog & Mate</h1>
        <div class='row'>
            <div class='col-md'>
       
                <div class='card text-white bg-danger mb-3 h-100' style='max-width: 100%;'>
                    <div class='card-header'>Total Mate Times</div>
                        <div class='card-body'>
                            <?php
                                include('connectDataBase.php');

                                $sqlTotalMateTimes = "SELECT SUM(cantidadMate) AS 'totalMateTimes'
                                                        FROM blog_General";
                                                     
                                $res = $conn->query($sqlTotalMateTimes);
                                $res->num_rows > 0;
                                $row = $res->fetch_array();

                                echo "<center><h1 class='card-title'>".$row['totalMateTimes']." Times</h1></center>";

                                $conn->close(); 
                            ?> 
                        </div>
                </div>

            </div>
        
            <div class='col-md'>

                <div class='card text-white bg-danger mb-3 h-100' style='max-width: 100%;'>
                    <div class='card-header'>Total Writing Times</div>
                        <div class='card-body'>
                            <?php
                                include('connectDataBase.php');

                                $sqlTotalWriting = "SELECT FLOOR(SUM(tiempoEscritura)) AS 'totalWriting'
                                                    FROM blog_General";
                                                     
                                $res = $conn->query($sqlTotalWriting);
                                $res->num_rows > 0;
                                $row = $res->fetch_array();

                                echo "<center><h1 class='card-title'>".$row['totalWriting']." Hs</h1></center>";

                                $conn->close(); 
                            ?> 
                        </div>
                </div>

            </div>

            <div class='col-md'>

                <div class='card text-white bg-danger mb-3 h-100' style='max-width: 100%;'>
                    <div class='card-header'>Total Posts</div>
                        <div class='card-body'>
                            <?php
                                include('connectDataBase.php');

                                $sqlTotalPosts = "SELECT COUNT(nombrePublicacion) as totalPosts
                                                  FROM blog_General
                                                    WHERE esNuevo = 1";
                                                     
                                $res = $conn->query($sqlTotalPosts);
                                $res->num_rows > 0;
                                $row = $res->fetch_array();

                                echo "<center><h1 class='card-title'>".$row['totalPosts']."</h1></center>";

                                $conn->close(); 
                            ?> 
                        </div>
                </div>

               </div>
        
        </div>
    </div><!-- /container -->
    </br>
    <div class='container'>
        <h1>Work Out</h1>
        <div class='row'>
            <div class='col-md'>
       
                <div class='card text-white bg-Warning mb-3' style='max-width: 100%;'>
                    <div class='card-header'>Total Running Time</div>
                        <div class='card-body'>
                            <?php
                                include('connectDataBase.php');

                                $sqlTotalTime = "SELECT FLOOR(SUM(tiempoCorrido)) AS 'totalTime'
                                                    FROM wo_Running";
                                                     
                                $res = $conn->query($sqlTotalTime);
                                $res->num_rows > 0;
                                $row = $res->fetch_array();

                                echo "<center><h1 class='card-title'>".$row['totalTime']." Min</h1></center>";

                                $conn->close(); 
                            ?> 
                        </div>
                </div>

            </div>
        
            <div class='col-md'>

                <div class='card text-white bg-Warning mb-3' style='max-width: 100%;'>
                    <div class='card-header'>Total Run Kilometers</div>
                        <div class='card-body'>
                            <?php
                                include('connectDataBase.php');

                                $sqlTotalKms = "SELECT CAST(SUM(kmCorridos) AS DECIMAL(10,1)) AS 'totalKms'
                                                    FROM wo_Running";
                                                     
                                $res = $conn->query($sqlTotalKms);
                                $res->num_rows > 0;
                                $row = $res->fetch_array();

                                echo "<center><h1 class='card-title'>".$row['totalKms']." Km</h1></center>";

                                $conn->close(); 
                            ?> 
                        </div>
                </div>

            </div>

            <div class='col-md'>

                <div class='card text-white bg-Warning mb-3' style='max-width: 100%;'>
                    <div class='card-header'>Total Weight Loss</div>
                        <div class='card-body'>
                            <?php
                                include('connectDataBase.php');

                                $sqlTotalWl = "SELECT CAST(SUM(diferenciaPeso) AS DECIMAL(10,2)) AS 'totalWl'
                                                    FROM wo_WeightLoss";
                                                     
                                $res = $conn->query($sqlTotalWl);
                                $res->num_rows > 0;
                                $row = $res->fetch_array();

                                echo "<center><h1 class='card-title'>".$row['totalWl']." Kg</h1></center>";

                                $conn->close(); 
                            ?> 
                        </div>
                </div>

               </div>
        
        </div>
    </div><!-- /container -->

    <footer class="page-footer font-small blue pt-4 bg-light mt-auto">
        <div class="footer-copyright text-center py-3">2019 MIT License |
          <a href="https://github.com/jpromanonet/myProgressStats" target="_blank"> Github</a>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>

</body>
</html>