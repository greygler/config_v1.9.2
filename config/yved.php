
<? 
//$title="Продукт";
$price=$price_new; 
//$valuta="грн";
$pol=$auditoria;// m или w, пустое значение - имена смешиваются
if (($country_script=="") OR ($country_script=="auto")) $country=$country_code; 
else $country=$country_script;

//$vsego=10;
$name_w = array("Татьяна", "Светлана", "Елена", "Алина", "Екатерина", "Дарья", "Анжела", "Кристина", "Мирослава","Валерия","Маргарита","Евгения","Александра","Виктория","Анастасия","Мария","Ольга","Карина","Ксения","Наталья","Марина","Светлана","Вера");
$surname_w = array("Смирновa","Абрамовa","Авдеевa","Блиновa","Большаковa","Волковa","Дмитриевa","Зуевa","Капустинa","Котовa","Макаровa","Моисеевa","Никоновa","Осиповa","Поповa","Русаковa","Селезнёвa","Соболевa","Трофимовa","Федотовa","Черновa","Щукинa","Репникова","Носова","Лебедьева","Журавлева","Сазонова","*******");
$surname_n = array("Кравец","Кравченко","Ковальчук","Матвиенко","Удовиченко","Мережко","Полищук","Вдовиченко","Бутенко","Дзюба","Гончарук","Кондратюк","Рубан","Лавренко","Овчаренко","Косенко","Тимченко","Сербиненко","Прокопенко","Кавун","Голуб","Маланюк","Пилипенко","Сердюк","Говоруха","Верховодько","Ткаченко","Лещенко","Собчак","Гузенко","Горобец","Воробей","Тимошенко","Романюк","Мишкевич","Винич","Бутко","Казакевич","Котвич","Клочко","Горбенко","Авдиенко","Мусиенко","Енченко","Луценко","Дудченко","Верховодько","Шульженко","Кондратенко","Гордиенко","Колодий","Мороз","Сазоненко","*******");
$name_m = array("Игорь","Владимир","Алексей","Андрей","Сергей","Вячеслав","Максим","Григорий","Георгий","Валерий","Михаил","Евгений","Александр","Виктор","Анатолий","Дмитрий","Олег","Павел","Петр","Контантин","Роман","Антон");
$surname_m = array("Смирнов","Абрамов","Авдеев","Блинов","Большаков","Волков","Дмитриев","Зуев","Капустин","Котов","Макаров","Моисеев","Никонов","Осипов","Попов","Русаков","Селезнёв","Соболев","Трофимов ","Федотов","Чернов","Щукин","Репников","*******");
$city_ua=array("Киев","Харьков","Одесса","Днепр","	Запорожье","Львов","Кривой Рог","Николаев","Мариуполь","Винница","Херсон","Чернигов","Полтава","Черкассы","Хмельницкий","Сумы","Житомир","Черновцы","Ровно","Каменское ","Крапивницкий","Ивано-Франковск","Кременчуг","Тернополь","Луцк","Белая Церковь","Никополь","Бердянск","Павлоград","Каменец-Подольский");
$city_ru=array("Москва","Санкт-Петербург","Новосибирск","Екатеринбург","Нижний Новгород","Казань","Челябинск","Омск","Самара","Ростов-на-Дону","Уфа","Красноярск","Пермь","Воронеж","Волгоград","Краснодар","Саратов","Тюмень","Тольятти","Ижевск","Барнаул","Иркутск","Ульяновск","Хабаровск","Ярославль");
if ($country=="UA") $city=$city_ua; else
if ($country=="RU") $city=$city_ru; else $city=array_merge ($city_ua, $city_ru);

if ($pol=="m") { $name=$name_m; $surname_all=array_merge($surname_m, $surname_n);} else
if ($pol=="w") { $name=$name_w; $surname_all=array_merge($surname_w, $surname_n);} else  
	{$name=array_merge($name_w, $name_m) ; $surname_all=$surname_n; }
?>



<script>
$(document).ready(function(){
$('<link rel="stylesheet" href="config/css/uved.css">').appendTo('head');

var i = 0;
function yved(){
i=1;
$('.yved:nth-child('+i+')').fadeIn(500).delay(5000).fadeOut(500);//В этой строчке в мс 500 - время анимации появления, 5000 - время задержки, 500 - время затухания уведомления соответсвенно
}
setTimeout(function(){
setInterval(
function(){
i=i+1;
if(i><?= $vsego ?>) i=1;// количество уведомлений
$('.yved:nth-child('+i+')').fadeIn(500).delay(5000).fadeOut(500);//В этой строчке в мс 500 - время анимации появления, 5000 - время задержки, 500 - время затухания уведомления соответсвенно
},<?= $delay1 ?>000);//25000 - задержка в мс между показами уведомлений
yved();
},<?= $delay2?>000);//10000 - задержка в мс перед показом первого уведомления
});
</script> 
	<div class="yvedw">
	<? for ($i=1; $i<=$vsego; $i++) { 
	$yved=mt_rand(1, 2); 
	if ($tovar>1) {
		$kvo=mt_rand(1, $tovar);
	$sht= "(".$kvo." шт.)";
	
	} else $kvo=1; ?>
		<div class="yved yvedf<?= $yved ?>">
			<img src="config/images/yico<?= $yved ?>.png" alt="" class="yvedi">
			<div class="yvedvt"><div class="yvedt"><?= "{$name[array_rand($name)]} {$surname_all[array_rand($surname_all)]}" ?> <br>г. <? if ($i==1) echo('<span class="geocity"></span>'); else echo $city[array_rand($city)] ?>,<br><? if ($yved==1) { ?> только что заказал(а) <?= $title ?>	<? if ($sht!=1) echo (" {$sht} ");  ?> на <?= $price*$kvo ?> <?= $valuta ?><? } else {?> оставил(а) заявку на обратный звонок<? } ?>.</div></div>
		</div>
	<? } ?>
		
	</div>
	