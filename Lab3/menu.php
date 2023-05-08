<?php
require_once 'logic.php';
global $fullList;
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
          </div>
          </div>
        </div>
      
    </div>
   </header>
   
   <main>
    
    <div class="col-md-10" style="background-color: black;">
      <div class="text-center ">
          <form method="get">
              <div class="fs-4 fw-bold">Фильтр поиска</div>
              <div class="mt-3 w-50 mx-auto">
                  <p>Номер аудитории</p>
                  <input type="text" name="number1" placeholder="Введите номер" value="<?= $_GET['number1']; ?>" class="form-control">
              </div>
              <div class="mt-3 w-50 mx-auto">
                  <p>Корпус</p>
                  <select name="id_building" class="form-control">
                      <option value="" selected="">Неизвестный</option>
                      <option value="1" <?php if ($_GET['id_building'] == '1') { ?>selected="selected" <?php }; ?>>Первый</option>
                      <option value="2" <?php if ($_GET['id_building'] == '2') { ?>selected="selected" <?php }; ?>>Второй</option>
                  </select>
              </div>
              <div class="mt-3 w-50 mx-auto">
                  <p>Оборудование</p>
                  <input type="text" name="equipment" placeholder="Введите оборудование" value="<?= $_GET['equipment']; ?>" class="form-control">
              </div>
              <div class="mt-3 w-50 mx-auto">
                  <p>Вместительность</p>
                  <input type="text" name="capacity" placeholder="Введите вместимость" value="<?= $_GET['capacity']; ?>" class="form-control">
              </div>
              <div class="mt-4">
              <button name="applyFilter" value="Применить фильтр" class="btn btn-primary mt-3 me-3 ">Применить фильтр</button>
              <button name="clearFilter" value="Очистить фильтр" class="btn btn-outline-primary mt-3">Очистить фильтр</button>
              </div>
          </form>
      </div>

      <?php if(count($fullList) > 0): ?>
          <table class="table text-white mt-4">
              <thead>
                  <tr>
                      <th scope="col">Изображение</th>
                      <th scope="col">Номер аудитории</th>
                      <th scope="col">Корпус</th>
                      <th scope="col">Оборудование в аудитории</th>
                      <th scope="col">Вместительность</th>
                  </tr>
              </thead>
              <tbody>
              <?php foreach($fullList as $item):?>
                  <tr>
                      <th scope="row"><img src="img/pizza/<?=$item['img_path']?>" style="max-width:150px;"></th>
                      <td><?=$item['number1']?></td>
                      <td><?=$item['id_building']?></td>
                      <td><?=$item['equipment']?></td>
                      <td><?=$item['capacity']?></td>
                  </tr>
              <?php endforeach;?>
              </tbody>
          </table>
      <?php endif;?>
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