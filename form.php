<style>
body{
    background-color: aquamarine;
    margin:5%;
}

h1{
    margin-left: 30%;
    margin-right: 30%;
}

.form_box{
    display:flex;
    justify-content: center;
}

.pas{
    margin:2%;
    padding: 5%;
    border: 1px solid;
    border-color: black;
    border-radius: 3px;
}
.err {
    border: 10px solid red;
  }
</style>
<?php
if (!empty($messages)) {
  print('<div id="messages">');
  // Выводим все сообщения.
  foreach ($messages as $message) {
    print($message);
  }
  print('</div>');
}
?>
<body>
    <div class="form_box">
    <h1>Форма</h1>
    
    <form action="index.php" method="POST">
            <div class="pas <?php if ($errs['name']) {print 'err';} ?>" >
                Имя:
                <input name="name" placeholder="Введите имя" 
                 value="<?php print $values['name']; ?>" />
            </div>

            <div class="pas <?php if ($errs['email']) {print 'err';} ?>">
                E-mail:
                <input name="email" type="email" placeholder="Введите почту" value="<?php print $values['email']; ?>"
	            >
            </div>

            <div class="pas" >
                Год рождения:
                <select id="yearB" name="year" >
                <?php
             for($i=1950;$i<=2023;$i++){
             if($values['year']==$i){
             printf("<option value=%d selected>%d </option>",$i,$i);
              }
             else{
             printf("<option value=%d>%d </option>",$i,$i);
            }
          }
          ?>
          </select>
            </div>

            <div class="pas <?php if ($errs['radio-1']) {print 'err';} ?>"> 
                Пол:
                <input type="radio" name="radio-1" value="male"  <?php if($values['radio-1']=="male") {print 'checked';} ?>/>
                Мужской
                <input type="radio" name="radio-1" value="female" <?php if($values['radio-1']=="female") {print 'checked';} ?>/>
                Женский
            </div>



            <div class="pas <?php if ($errs['radio-2']) {print 'err';} ?>">
                Сколько конечностей?
                    <input type="radio" name="radio-2" value="4" <?php if($values['radio-2']=="4") {print 'checked';} ?>/>
                    4

                    <input type="radio" name="radio-2" value="3" <?php if($values['radio-2']=="3") {print 'checked';} ?>/>
                    3

                    <input type="radio" name="radio-2" value="2" <?php if($values['radio-2']=="2") {print 'checked';} ?>/>
                    2

                    <input type="radio" name="radio-2" value="1" <?php if($values['radio-2']=="1") {print 'checked';} ?>/>
                    1
            </div>


            <div class="pas <?php if ($errs['super']) {print 'err';} ?>">
                Сверхспособности?
                
                    <select name="super[]" multiple="multiple">
                    <?php if ($errs['super']) {print 'class="err"';} ?> >
                    <option value="inv" <?php if($values['inv']==1){print 'selected';} ?>>Бессмертие</option>
                    <option value="walk" <?php if($values['walk']==1){print 'selected';} ?>>прохождение сквозь стены</option>
                    <option value="fly" <?php if($values['fly']==1){print 'selected';} ?>>левитация</option>
                    </select>
                
            </div>

            <div class="pas <?php if ($errs['bio']) {print 'err';} ?>">
                Биография?
                <textarea name="bio"><?php print $values['bio']; ?></textarea>
            </div>

                
                <input name='dd' hidden value=<?php print($_GET['edit_id']);?>>
                <input type="submit" name='save' value="Save"/>
                <input type="submit" name='del' value="Delete"/>
    </form>
             <a href='admin.php' class="button">Назад</a>

    </div>
</body>