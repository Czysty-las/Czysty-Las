<?php
$contactData = fopen("./Engine/Data/Config/contact.cf", "r");
$content = array();
$i = 0;

if ($contactData) {
    while (!feof($contactData)) {
        $fileLine = explode("=", fgets($contactData));
        $content[$i][0] = $fileLine[0];
        $content[$i][1] = $fileLine[1];
        ++$i;
    }
    $boss = $bossPhone = $veBoss = $veBossPhone = $fb = $email = "";
    for ($j = 0; $j < $i; $j++) {

        switch ($content[$j][0]) {
            case "boss":
                $boss = $content[$j][1];
                break;
            case "bossPhone":
                $bossPhone = $content[$j][1];
                break;
            case "veBoss":
                $veBoss = $content[$j][1];
                break;
            case "veBossPhone":
                $veBossPhone = $content[$j][1];
                break;
            case "fb":
                $fb = $content[$j][1];
                break;
            case "email":
                $email = $content[$j][1];
                break;
        }
        //    echo "<p>" . $content[$j][0] . " " . $content[$j][1] . "</p>";
    }
/*    echo
    '
        <table>
            <tr>
                <td>Prezes</td><td>' . $boss . '</td><td>' . $bossPhone . '</td>
            </tr>    
            <tr>
                <td>Wice prezes</td><td>' . $veBoss . '</td><td>' . $veBossPhone . '</td>
            </tr>    
            <tr>
                <td colspan="3"><a id="Fb" href="http://' . $fb . '"></a><a id="Em" href="mailto:' . $email . '"></a></td>
            </tr>              
        </table>
        ';  */
} else {
    echo 'Error!';
}
?>

<table>
    <tr>
        <td>Prezes</td><td><?php echo $boss; ?></td><td><?php echo $bossPhone; ?></td>
    </tr>    
    <tr>
        <td>Wice prezes</td><td><?php echo $veBoss; ?></td><td><?php echo $veBossPhone; ?></td>
    </tr>    
    <tr>
        <td colspan="3"><a id="Fb" href="http://<?php echo $fb; ?>"></a><a id="Em" href="mailto:<?php echo $email; ?>"></a></td>
    </tr>              
</table>

<form>
    <input name="mail" value="<?php echo $email ?>" hidden="true">
    <input name="Topick" placeholder="Twój Emaijl"/>
    <input name="Topick" placeholder="Temat"/>
    <textarea name="contents" placeholder="Napisz do nas!"></textarea>
    <button type="submit">wyślij</button>
</form>