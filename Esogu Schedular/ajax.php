

<?php
include ("config.php");

// ön tanımlı sql sorguları için düşümdüm ama olmuyor !!!
// DİLİMLER TABLOSU
// $adn="adn";
// $dilim="dilim";
// $sure="sure";
// $teo_uyg="teo_uyg";
// $dprogDTable="dprog";
// BİRİMLER TABLOSU
// $birim_adi="birim_adi";
// $birim_no="birim";
// $bolumlerDTable="bolumler";
// //SELECT adn,birim,dkodu,ders_adi,teo,uyg,sube FROM dersler where birim={$_POST['birim']} ORDER BY ders_adi desc";
// DERSLER TABLSU
// $derskodu="dkodu";
// $ders_adi= "ders_adi";
// $teori="teo";
// $uyg="uyg";
// $sube="sube";
// $derslerDTable="dersler";

if (isset($_POST["action"]) && !empty($_POST["action"]))
	{
	$action = $_POST["action"];
	switch ($action)
		{
	case "funcBolumler":
		funcBolumler();
		break;

	case 'funcDersler':
		funcDersler();
		break;

	case 'funcDilimler':
		funcDilimler();
		break;

	case 'funcGrupDersleri':
		funcGrupDersleri();
		break;

		// ...etc...

		}
	}
/*
function funcOtomatikDilimler()
	{
	include ("config.php");

	$data = json_decode($_POST["sendToJSONString"], TRUE);
	for ($i = 0; $i < sizeof($data); $i++)
		{

		// code...

		$secilenAdn[$i] = $data[$i];
		}

	// print_r($secilenAdn);

	$sorguSecilenAdn = implode("','", $secilenAdn);
	$sql = "SELECT adn ,dilim,sure,teo_uyg FROM dprog WHERE adn IN ('$sorguSecilenAdn')";
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
		{
		$index = 0;
		while ($row = $result->fetch_assoc())
			{
			$myDilimArray[$index] = $row; // dersleri arraya ekleme
			$index++;

			// echo $row["dilim"] . " ";

			}

		$js_array = safe_json_encode($myDilimArray);
		echo $js_array;
		}
	  else
		{
		echo "Birşeyler ters gitti";
		}

	//   echo $result;

	}
*/
function funcDilimler()
	{
	include ("config.php");

	$data = json_decode($_POST["sendToJSONString"], TRUE);
	for ($i = 0; $i < sizeof($data); $i++)
		{

		// code...

		$secilenAdn[$i] = $data[$i]["adn"];
		}

	// print_r($secilenAdn);

	$sorguSecilenAdn = implode("','", $secilenAdn);
	//$sql="CALL getdilimler('$sorguSecilenAdn')";// store prosedurle olmadı diziyi IN içerisine gönderemedim
	 $sql = "SELECT adn ,dilim,sure,teo_uyg FROM dprog WHERE adn IN ('$sorguSecilenAdn')";
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
		{
		$index = 0;
		while ($row = $result->fetch_assoc())
			{
			$myDilimArray[$index] = $row; // dersleri arraya ekleme
			$index++;

			// echo $row["dilim"] . " ";

			}

		$js_array = safe_json_encode($myDilimArray);
		echo $js_array;
		}
	  else
		{
		echo "Birşeyler ters gitti";
		}

	//   echo $result;

	}

function funcBolumler()
	{
	include ("config.php");
	//$sql = "SELECT birim_adi,birim FROM bolumler";
	$sql = "CALL getbirimler()";
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
		{

		// echo "<select id='selectedBolum' onchange= getClickedBolumId()> ";
		// echo "<option selected='selected' hidden>Bölüm Seçiniz</option>";

		while ($row = $result->fetch_assoc())
			{
			$myBirimArray[] = $row; // birimleri arraya ekleme

			// echo "<option value='".$row["birim"]."'>". $row["birim_adi"] . "</option>";

			}

		// echo "</select>";

		$js_array = safe_json_encode($myBirimArray);
		echo $js_array;
		}
	  else
		{
		echo "Birşeyler ters gitti";
		}
	}

function funcDersler()
	{
	include ("config.php");
	//$sql = "SELECT adn,birim,egitmen,dkodu,ders_adi,teo,uyg,sube,DersGrubu,sinif FROM dersler where birim={$_POST['birim']} AND sinif={$_POST['sinif']} ORDER BY ders_adi desc"; // myBirimArraydan index bilgisine göre "where" kısında "birim" eşlemeşmesi yapılacak
	$sql = "CALL getdersler('{$_POST['birim']}','{$_POST['sinif']}')"; // myBirimArraydan index bilgisine göre "where" kısında "birim" eşlemeşmesi yapılacak
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
		{
		$index = 0;
		while ($row = $result->fetch_assoc())
			{
			$myDersArray[$index] = $row; // dersleri arraya ekleme
			$index++;

			// echo "<li><a  onclick=\"getClickedDersId(this.id) \" title=\"".$row["sube"]." \" id=\"".$row["adn"]." \" >".$row["ders_adi"]." </a></li>";
			//  echo "<option value=" . $row["adn"] . " >" . $row["ders_adi"] . "   " . $row["sube"] . "    </option>";

			}

		$js_array = safe_json_encode($myDersArray);
		echo $js_array;
		}
	  else
		{
		echo "0 result";
		}
	}

function funcGrupDersleri()
	{
	include ("config.php");
	$sql = "CALL getgrupdersleri('{$_POST['dersgrubu']}')";
	//$sql = "SELECT adn,birim,dkodu,ders_adi,teo,uyg,sube,dersgrubu,sinif FROM dersler where dersgrubu={$_POST['dersgrubu']}"; // myBirimArraydan index bilgisine göre "where" kısında "birim" eşlemeşmesi yapılacak
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
		{
		$index = 0;
		while ($row = $result->fetch_assoc())
			{
			$myGrupDersArray[$index] = $row; // dersleri arraya ekleme
			$index++;
			}

		$js_Gruparray = safe_json_encode($myGrupDersArray);
		echo $js_Gruparray;

		

		}
	  else
		{
		echo "0 result";
		}
	}

function safe_json_encode($value, $options = 0, $depth = 512)
	{
	$encoded = json_encode($value, $options, $depth);
	if ($encoded === false && $value && json_last_error() == JSON_ERROR_UTF8)
		{
		$encoded = json_encode(utf8ize($value) , $options, $depth);
		}

	return $encoded;
	}

function utf8ize($mixed)
	{
	if (is_array($mixed))
		{
		foreach($mixed as $key => $value)
			{
			$mixed[$key] = utf8ize($value);
			}
		}
	elseif (is_string($mixed))
		{
		return mb_convert_encoding($mixed, "UTF-8", "UTF-8");
		}

	return $mixed;
	}

?>
