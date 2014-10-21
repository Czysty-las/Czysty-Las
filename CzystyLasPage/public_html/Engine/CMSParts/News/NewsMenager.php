<?php

//include '../Engine/CMSParts/Dadabase/DatabaseEditor.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NewsMenager
 *
 * @author Lukasz
 */
class NewsMenager extends DatabaseEditor {

    public function __construct($_colNames = array(), $_target) 
    {
        parent::__construct($_colNames, $_target, "news");
        /*
         * Zmiana domyslnych przycików przechowywanych DatabaseEditor, 
         * na przyciski ukierunkowane pod layout.
         */
        $this->DeleteButton = '<button type="submit" name="function" value="delete_news" class="newsDeleteItem">-</button>';
        $this->AddButton    = '<button type="submit" name="function" value="add_news" class="newsOK">OK</button>';
        $this->EditButton   = '<button type="submit" name="function" value="edit_news" class="newsOK">OK</button>';
    }

    public function Show() 
    {
        /*
         * Zmienne, ktore przechowają odpowiedne wartości wybranego kontentu do edycji. 
         * 
         * ** Petla wchile ** - 
         * 
         * Jesli wśrod danych z bazy danych znajdziemy interesujący nas element do edycji
         * przechowujemy zapisujemy zawartość co pozwoli nam wypełnić formularz przeznaczony do 
         * edycji treści.
         * 
         */
        
        $_id = 0; $_author = ''; $_content = '';
        
        /*
         * Id elemenu do edycji przekazywane jest za pomocą $_GET[]
         * W następuje tu sprawdzenie, czy id zostało przesłane,
         * poczym jego wartość jest zapisywana do zmiennej. 
         */
        if(isset($_GET['id'])) $_id = $_GET['id'];
        
        echo '<div class="currentNews">';    
        
        /*
         * Sprawdzanie, czy w istnieje zmienna sugerujaca fakt 
         * dodania noych rekordów do bazy(add), albo edycji już instejących(id) 
         */
        
        if(isset($_GET['add']) || $_id > 0)
        {
            if($_id > 0)    //  Edycja
            {
                echo '<form action="' . $this->Target . '" method="post">';    
            }
            else            //  Dodanie do bazy
            {
                /*
                 * Dodanie do bazy generuje adekwatny formularz. 
                 */
                echo '<form action="' . $this->Target . '" method="post">';
                echo '<input type="text" name="' . $this->ColsNames[2] . '" value="Temat" class="newsItem" id="teopicInput"/>';                
            }
        }

        //  Składnie zapytania
        $q = 'SELECT * FROM `news` ORDER BY `news`.`Id` DESC';
        $this->users = mysql_query($q); //  Wysłanie zapytania.
        //  Pętla generaująca poszczególne wiersze reprezentujące dodanych urzytkowników.

        /*
         * Pobranie listy dostępnych w dazie danych newsów.  
         */
        
        while ($print = mysql_fetch_array($this->users)) 
        {
            /*
             * Przy generaci listy sprawzaja jest zmienna(add)
             * jeżeli nie istnieje uaktywniane są formularze usuwania
             * 
             * +++
             * 
             */
            if (!isset($_GET['add'])) 
            {
                if($_id == $print[$this->ColsNames[0]])
                {
                    echo '<input type="text" name="' . $this->ColsNames[2] . '" value="'.$print[$this->ColsNames[2]].'" class="newsItem" id="teopicInput"/><div class="newsPointItem">></div>'
                        .'<input type="text" hidden="true" name="' . $this->ColsNames[0] . '"  value="' . $print[$this->ColsNames[0]] . '"/>';
                    $_content = $print[$this->ColsNames[3]];
                }
                else 
                {
                    /*
                     * Formularze usuwanie rekordów nie są generowanie także przy edycji rekordów w bazie.
                     */
                    if(!$_id > 0)
                    {
                        /*
                         * +++
                         * Generacja forlularzy usuwania
                         */
                        echo '<form action="'. $this->Target .'" method="post">'
                        . '<input type="text" hidden="true" name="' . $this->ColsNames[0] . '"  value="' . $print[$this->ColsNames[0]] . '"/>'; //  Przekazanie Id elementu do usunięcia przez post -> powrót do CMS.php -> Wywolanie odpowiedniej metody
                        echo '<a class="newsItem" href="CMS.php?function=news&id=' . $print[$this->ColsNames[0]] . '">' . $print[$this->ColsNames[2]] . $this->DeleteButton . '</a>';
                        echo '</form>';
                    }
                    else    // Jesli występuje edycja albo dodawanie generowane sią tylko odnośniki pozwalające systemowi rozpoznać rekord do edycji. (Edycja)
                    {
                        echo '<a class="newsItem" href="CMS.php?function=news&id=' . $print[$this->ColsNames[0]] . '">' . $print[$this->ColsNames[2]] .'</a>';                        
                    }
                }
            }
            else     // Jesli występuje edycja albo dodawanie generowane sią tylko odnośniki pozwalające systemowi rozpoznać rekord do edycji.  (Dodawanie)
            {
                echo '<a class="newsItem" href="CMS.php?function=news&id=' . $print[$this->ColsNames[0]] . '">' . $print[$this->ColsNames[2]] .'</a>';
            }
        }
        echo '</div>';
        
        echo '<div class="newsEditFeald">';
        /*
         * Generacja formularza przeznaczonego do edycji/dodania elementu w bazie.
         * 
         */
        if (isset($_GET['add']) || $_id > 0)    //  Funkcja sprawdzajacz czy w linku($_get[]) pojawiła się zmienna sugerująca dodawanie/edycję elemenyu. 
        {
            if($_id > 0)    //  Jesli pojawiła się id wskazujace element do edycji
            {
                echo '<textarea rows="40" name="'.$this->ColsNames[3].'" class="ckeditor">'.$_content.'</textarea>'
                     .'<input type="text" hidden="true" name="' . $this->ColsNames[1] . '"  value="' . $print[$this->ColsNames[1]] . '"/>';;
                
                echo '<div class="newsCenter">';     
                echo $this->EditButton;
                echo '<a class="newsOK" href="CMS.php?function=news">Powrót</a>';
                echo '</div>'; 
                echo '</form>';
            }
            else           // W przeciwnym razie pojawiła sie zmienna inicjalizujaca dodawanie. 
            {
                echo '<textarea name="' . $this->ColsNames[3] . '" class="ckeditor">Treść</textarea>';
                echo '<input type="text" hidden="true" value="'.$_SESSION['user']->GetUserId().'" name="' . $this->ColsNames[1] . '"/>';
                echo '<div class="newsCenter">';     
                echo $this->AddButton;
                echo '<a class="newsOK" href="CMS.php?function=news">Powrót</a>';
                echo '</div>'; 
                echo '</form>';
            }
        } 
        else    //  Jeżeli nie wystąpiła zmienna dodawania/edycji wyświetlany jest przyciks DODAJ
        {
            echo '<a class="newsAddItem" href="CMS.php?function=news&add=true">Dodaj</a>';
        }
        echo '</div>';
    }

    public function Add($_params = array()) {
        // Składnia zapytania.
        $date = date('d.m.Y\r.');
        $uid = $_SESSION['user']->GetUserId();
        echo $uid;
        $q = "INSERT INTO `czysty-las-database`.`news` (`Id`, `UserId`, `Topic`, `Content`, `Date`) VALUES (NULL, '$uid]', '$_params[0]', '$_params[1]', '$date')";
        $ins = mysql_query($q); //  Wysłanie zapytania.
    }

    public function Delete($_param) 
    {
        $q = "DELETE FROM `czysty-las-database`.`news` WHERE `news`.`Id` = '$_param'" ;
        $ins = mysql_query($q);
    }

    public function Edit($_params = array()) 
    {
        $q = "UPDATE `czysty-las-database`.`news` SET `UserId` = '$_params[1]', `Topic` = '$_params[2]', `Content` = '$_params[3]' WHERE `news`.`Id` = '$_params[0]'";
        $ins = mysql_query($q); //  Wysłanie zapytania.
    }

}
