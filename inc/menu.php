<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo APP_URL;?>"><?php echo APP_NAME." ".APP_VERSION;?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?php echo APP_URL;?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo APP_URL."new-quiz.php";?>">New Quiz</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo APP_URL."quizzes.php";?>">Quizzes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo APP_URL."quiz.php";?>">Quiz</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo APP_URL."questions.php";?>">Questions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo APP_URL."records.php";?>">Records</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="<?php echo APP_URL."register.php";?>">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo APP_URL."login.php";?>">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo APP_URL."dashboard.php";?>">Dashboard</a>
        </li> -->
      </ul>
    </div>
  </div>
</nav>