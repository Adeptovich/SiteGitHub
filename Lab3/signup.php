<?php
require_once 'process_signup.php';

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
                        
                        <a class="nav nav-link" href="login.php" style="display:inline">
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
            <div class="p-1">

            </div>
        </div>
        <div class="col-md-10">

        </div>
        <div class="col-md-1">

        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1">

        </div>
        <div class="col-md-10 mx-auto" style="background-color: black;min-height:20rem;">
            <div class="col-md-5 mx-auto">
                <div class="text-center">
                <p class="py-2"><a href="mainpage.php">Домашняя страница</a> &gt; Регистрация </p>
                    <h3><b>Регистрация</b></h3>
                    <?php
                    if(!isset($_SESSION['user'])){
                    ?>
                        <form action="signup.php" method="POST">
                            <input type="hidden" name="action" value="signup">
                            <div class="form-group mt-2">
                                <label for="email">Email (Логин) <span class="red">*</span></label>
                                <input type="email" name="email" id="email" class="form-control mt-2" placeholder="example@example.com" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];}?>">
                                <span class="red"><?php if(!empty($arrErr['email'])){echo $arrErr['email'];} ?></span>
                            </div>
                            <div class="form-group mt-2">
                                <label for="full_name">ФИО <span class="red">*</span></label>
                                <input type="text" name="full_name" id="full_name" class="form-control mt-2" placeholder="Иванов Иван Иванович" value="<?php if(isset($_POST['full_name'])){ echo $_POST['full_name'];}?>">
                                <span class="red"><?php if(!empty($arrErr['full_name'])){echo $arrErr['full_name'];} ?></span>
                             </div>
                            <div class="form-group mt-2">
                                <label for="blood_type">Группа крови <span class="red">*</span></label>
                                <select name="blood_type" id="blood_type" class="form-control mt-2">
                                    <option value="" disabled="" selected="">Группа крови</option>
                                    <?php if(isset($_POST['blood_type']) && !empty($_POST['blood_type'])){
                                        switch($_POST['blood_type']){
                                            case 1:
                                                echo '<option value="1" selected="">0 (I)</option>';
                                                echo '<option value="2">A (II)</option>';
                                                echo '<option value="3">B (III)</option>';
                                                echo '<option value="4">AB (IV)</option>';
                                                break;
                                            case 2:
                                                echo '<option value="1">0 (I)</option>';
                                                echo '<option value="2" selected="">A (II)</option>';
                                                echo '<option value="3">B (III)</option>';
                                                echo '<option value="4">AB (IV)</option>';
                                                break;
                                            case 3:
                                                echo '<option value="1">0 (I)</option>';
                                                echo '<option value="2">A (II)</option>';
                                                echo '<option value="3" selected="">B (III)</option>';
                                                echo '<option value="4">AB (IV)</option>';
                                                break;
                                            case 4:
                                                echo '<option value="1">0 (I)</option>';
                                                echo '<option value="2">A (II)</option>';
                                                echo '<option value="3">B (III)</option>';
                                                echo '<option value="4" selected="">AB (IV)</option>';
                                                break;
                                        }
                                    }else{
                                        echo '<option value="1">0 (I)</option>';
                                        echo '<option value="2">A (II)</option>';
                                        echo '<option value="3">B (III)</option>';
                                        echo '<option value="4">AB (IV)</option>';
                                    }
                                    ?>
                                </select>
                                <span class="red"><?php if(!empty($arrErr['blood_type'])){echo $arrErr['blood_type'];} ?></span>

                            </div>
                            <div class="form-group mt-2">
                                <label for="factor">Резус-фактор <span class="red">*</span></label>
                                <select name="factor" id="factor" class="form-control mt-2">
                                    <option value="" disabled="" selected="">Резус-Фактор</option>
                                    <?php if(isset($_POST['factor']) && !empty($_POST['factor'])){
                                        switch($_POST['factor']){
                                            case 'plus':
                                                echo '<option value="plus" selected="">Положительный (+)</option>';
                                                echo '<option value="minus">Отрицательный (-)</option>';
                                                break;
                                            case 'minus':
                                                echo '<option value="plus">Положительный (+)</option>';
                                                echo '<option value="minus" selected="">Отрицательный (-)</option>';
                                                break;
                                        }
                                    }else{
                                        echo '<option value="plus">Положительный (+)</option>';
                                        echo '<option value="minus">Отрицательный (-)</option>';
                                    }
                                    ?>
                                </select>
                                <span class="red"><?php if(!empty($arrErr['factor'])){echo $arrErr['factor'];} ?></span>
                            </div>
                            <div class="form-group mt-2">
                                <label for="vk">Ссылка на профиль Вконтакте</label>
                                <input type="url" name="vk" id="vk" class="form-control mt-2" placeholder="https://vk.com/idx" value="<?php if(isset($_POST['vk'])){ echo $_POST['vk'];}?>">
                            </div>
                            <div class="form-group mt-2">
                                <label for="password">Пароль <span class="red">*</span></label>
                                <input type="password" name="password" id="password" class="form-control mt-2" placeholder="********">
                                <span class="red"><?php if(!empty($arrErr['password'])){echo $arrErr['password'];} ?></span>
                            </div>
                            <div class="form-group mt-2">
                                <label for="password_confirm">Подтвердите пароль <span class="red">*</span></label>
                                <input type="password" name="password_confirm" id="password_confirm" class="form-control mt-2" placeholder="********">
                                <span class="red"><?php if(!empty($arrErr['password_confirm'])){echo $arrErr['password_confirm'];} ?></span>
                            </div>
                            <button type="submit" class=" btn btn-block btn-primary tx-tfm register-btn mt-4">
                                Зарегистрироваться
                            </button>
                            <div class="form-group mt-3">
                                <p class="text-center">Уже есть аккаунт? <a href="login.php">Войти в аккаунт</a></p>
                            </div>
                        </form>
                        <?php
                        }else{
                            echo '<p class="text-warning"> Вы уже авторизованы как ' . $_SESSION['user'] . '</p>' . '<a class="red" href="logout.php">Выйти.</a>';
                        }
                        ?>
                        <!--Отображение шаблона формы регистрации.
                        Данные об ошибках выводим из $signUpErrors,
                        поля формы предзаполняем из $_POST с фильтрацией!-->
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