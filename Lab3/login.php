<?php
require_once 'process_login.php';

?>

<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Колледж информационных технологий IThub после 9 и 11 класса в Москве</title>
      <link rel="icon" href="image/unnamed.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/fonts.css" rel="stylesheet">
    
    <script src="js/bootstrap.js"></script>
  </head>
  <body>
   <header>
    <div style="width: 100%; display: flex; justify-content: center; ">
      <div class="container x-container navbar-conteiner d-flex uptext"  >
		        <a class="navbar-brand py-1 me-3">
                        <img src="logoIThub.png" alt="logo" width="130px">
                            </a>

        <div class="row d-flex align-items-end">
          <div class="col">
            <nav class="navbar navbar-expand-lg p-0">
              <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
					            <li class="nav-item">
                        <a class="nav-link" href="/abiturientam">Поступление-2023</a>
                    </li>
                                        <li class="nav-item">
                        <a class="nav-link" href="/about">О колледже</a>
                    </li>
                                        <li class="nav-item">
                        <a class="nav-link" href="/bulgakov">Онлайн-платформа </a>
                    </li>
                                        <li class="nav-item">
                        <a class="nav-link" href="/studentam">Студентам</a>
                    </li>
                                                    
                <li class="nav-item">
                        <a class="nav-link" href="tel:+74993506604">+7 (499) 350-66-04</a>
                    </li>      
                </ul>
            </div>
            </nav>
          <nav class="navbar navbar-expand-lg py-0">
            <div class="collapse navbar-collapse">
              <ul class="navbar-nav">
				<li class="nav-item"> 
						<a class="nav-link ">Прием-2022</a>
					</li>	
					<li class="nav-item">
					  <a class="nav-link">СВЕДЕНИЯ ОБ ОБРАЗОВАТЕЛЬНОЙ ОРГАНИЗАЦИИ</a>
				  </li>
					 <li class="nav-item">
						<a class="nav-link pt-0"><img src="border_menu.svg" alt="border" class="capabilities__border_img" style="position: relative;"></a>
					</li>
              </ul>

            </div>

          </nav>
          <div class="mt-4 mb-4">
          <?php
                if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                    ?>
                    <li class="nav-item" style="padding-left: 20px">
                        Вы вошли как <?php echo $_SESSION['user'].'.'; ?>
                        <a class="nav nav-link red" href="logout.php" style="--bs-link-hover-color: #ff8c00; --bs-link-color: black; display:inline">
                            Выйти.
                        </a>
                    </li>
                    <?php
                }else{
                    ?>
                    <li class="nav-item" style="padding-left: 20px">
                        Вы не авторизованы.
                        
                        <a class="nav nav-link" href="login.php" style="--bs-link-hover-color: #ff8c00; --bs-link-color: black; display:inline">
                            Ввести логин и пароль
                        </a>
                        или
                        <a class="nav nav-link" href="signup.php" style="--bs-link-hover-color: #ff8c00; --bs-link-color: black; display:inline">
                            зарегистрироваться
                        </a>
                    </li>
                    <?php
                }
                ?>
                </div>
          </div>
          </div>
        </div>
      
    </div>
   </header>

<main>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-1">

        </div>
        <div class="col-md-10 mx-auto" style="background-color: black;min-height: 20rem;">
            <div class="col-md-5 mx-auto">
            <div class="row">
                <p class="py-2"><a href="mainpage.php">Домашняя страница</a> &gt; Создание аккаунта </p>
            </div>
                <div class="text-center">
                    <h3><b>Авторизация</b></h3>
                    <?php

                    if(isset($_SESSION['reg_success'])){
                        echo '<p class="green"> '.$_SESSION['reg_success'].'</p>';
                    }
                    unset($_SESSION['reg_success']);

                    ?>
                    <?php
                    if(!isset($_SESSION['user'])){
                    ?>
                    <form action="login.php" method="POST">
                        <input type="hidden" name="action" value="signin">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="example@example.com" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];}?>">
                            <span class="red"><?php if(!empty($arrErr['email'])){echo $arrErr['email'];} ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="**********">
                            <span class="red"><?php if(!empty($arrErr['password'])){echo $arrErr['password'];} ?></span>
                        </div>
                        <div class="col-md-12 text-center ">
                            <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm login-btn" style="margin-top: 1rem">
                                Войти
                            </button>
                        </div>
                        <div class="form-group">
                            <p class="text-center">Ещё нет аккаунта? <a href="signup.php">Зарегистрируйтесь</a></p>
                        </div>
                    </form>
                    <?php
                    }else{
                        echo '<p class="text-warning"> Вы уже авторизованы как ' . $_SESSION['user'] . '</p>' . '<a class="red" href="logout.php">Выйти.</a>';
                    }
                    ?>
                    <?php

                    if(isset($_SESSION['login_success'])){
                        echo '<p class="text-warning mt-5">' . $_SESSION['login_success'] . '</p>';
                    }
                    unset($_SESSION['login_success']);

                    ?>
                </div>
            </div>


        </div>
        <div class="col-md-1">

        </div>
    </div>
</div>





            </main>





   <footer class="page-footer mt-5 font-small blue pt-4 dtext" id="footer">
      <div class="container">
      <div class="row">
          <hr style="border-top: 0px;">
      </div>
  <div style="display: flex; justify-content: center; align-items: center;">

    <div class="container text-md-left">
      <div class="row">
        <hr class="clearfix w-100 d-md-none pb-3">
        <div class="col-md-3 mb-md-0 mb-3">
          <ul class="list-unstyled footer-list">
            <li>
              <p style="color: #AB00EA;">О колледже</p>
            </li>
                      <li>
              <a target="_blank">О нас</a>
            </li>
            <li>
              <a target="_blank">Сведения об образовательной организации</a>
            </li>
            <li>
              <a target="_blank">Реквизиты</a>
            </li>
            <li>
              <a>Оплата</a>
            </li>
            <li>
              <a>Магазин IThub shop</a>
            </li>          
            <li>
              <a>Франшиза IThub</a>
            </li>    
              <li>
              <a>Вакансии</a>
            </li> 
          </ul>
        </div>
        <div class="col-md-4 mb-md-0 mb-3">
          <ul class="list-unstyled footer-list">
            <li>
              <p style="color: #AB00EA;">Образование</p>
            </li>
            <li>
              <a target="_blank">Очно-заочное образование</a>
            </li>          
            <li>          
            </li><li>
              <a target="_blank">iHub school*</a>
            </li>          
            <li>
              <a target="_blank">IThub camp</a>
            </li>
            <li>
              <a target="_blank">Подготовительные курсы</a>
            </li>
            <li>
              <a target="_blank">Олимпиада</a>
            </li>
            <li>
              <a target="_blank">Дополнительное образование</a>
            </li>         
          </ul>
        </div>
        <div class="col-md-3 mb-md-0 mb-3">
          <ul class="list-unstyled footer-list">
            <li>
              <p style="color: #AB00EA;">Контакты</p>
            </li>
            <li>
              <p>Приемная комиссия<br><a><span style="color: #AB00EA;">info@ithub.ru<br>
              </span>
            </a>
            <a>
              <span class="ipad-small-font" style="color: #AB00EA;">+7 (499) 350-66-04</span></a></p>
            </li>       
            <li>
              <a  target="_blank">Административный корпус</a>
            </li>
            <li>
              <a  target="_blank">Учебные корпуса</a>
            </li>
          <li><a  target="_blank">IThub Екатеринбург</a></li>
          <li><a  target="_blank">IThub Ростов-на-Дону</a></li>
          <li><a  target="_blank">IThub Махачкала</a></li>
          <li><a  target="_blank">IThub Владивосток</a></li>
          </ul>
        </div>
        
        <div class="col-md-2 mb-md-0 mb-3">
      
          <ul class="list-unstyled footer-list socials__list">
            
            <li>
              <a  style="color: #585757 !important;" target="_blank">
                  <img class="footer-img" src="image/yt.png" width="21" height="21" alt=""> 
                  YouTube
              </a>
            </li>
            <li>
              <a style="color: #585757 !important;" target="_blank">
                  <img class="footer-img" src="image/vk.png" width="21" height="21" alt=""> 
                  ВКонтакте
              </a>
            </li>
           
          </ul>
        </div>
      </div>
      <div class="row mt-5 offset-md-1" style="width: 100%;justify-content:center;">
          
          <div class="mb-3 col-xl-4 col-md-4 col-sm-12"><a>Версия для слабовидящих</a></div>
          <div class="mb-3 col-xl-4 col-md-4 col-sm-12"><a target="_blank">Условия использования материалов</a></div>
          <div class="mb-3 col-xl-4 col-md-4 col-sm-12"><a >Политика конфиденциальности</a></div>
          
      </div>
      <div class="footer-copyright text-left py-3" style="font-size:10px;">*Дополнительные общеобразовательные программы<br></div>
   </div>
    </div>
    
    
    <div class="footer-copyright text-center py-3">© 2023, АВТОНОМНАЯ НЕКОММЕРЧЕСКАЯ ОРГАНИЗАЦИЯ ПРОФЕССИОНАЛЬНОГО ОБРАЗОВАНИЯ "МЕЖДУНАРОДНАЯ АКАДЕМИЯ ИНФОРМАЦИОННЫХ ТЕХНОЛОГИЙ "ИТ ХАБ"<br>вн. тер. г. муниципальный округ Таганский, пер. Костомаровский, д. 3, стр. 4, этаж/помещение 3/1, ком. 39<br>
  Москва, Москва 105120<br>
  Россия</div>
    </div>
  </footer>
  </body>
</html>