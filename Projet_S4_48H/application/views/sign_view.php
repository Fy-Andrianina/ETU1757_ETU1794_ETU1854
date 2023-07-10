
<script>
    window.addEventListener('load',function(){
        const pass1= document.getElementById('password1');
        const pass2= document.getElementById('password2');

        pass2.addEventListener('change',function(){
            if(pass1.value==pass2.value){
                pass2.style.border.color='red';
            }
        });

       <?php if(isset($error) && isset($defaultData)){ 
            if($defaultData['name'] != null){ ?>
               let name= document.getElementById('name');
               name.value="<?php echo $defaultData['name'] ?>";
          <?php  } 
            if($defaultData['email'] != null){ ?>
               let email= document.getElementById('email');
               email.value="<?php echo $defaultData['email'] ?>";
           <?php  } ?>
        <?php } ?>
    });
</script>
<div>
    <h3>Sign In</h3>

    <form action="insertNewUser" method="post">
        <label for="">Name</label>
        <input type="text" name="name" id="name"><br>

        <label for="">Email</label>
        <input type="e-mail" name="email" id="email"><br>

        <label for="">Password</label>
        <input type="password" name="password" id="password1"><br>
        <label for="">Confirm the password </label>
        <input type="password" name="name" id="password2"><br>

        <label for="">Sexe</label>
        <select name="sexe" id="">
            <?php for ($i=0; $i < count($sexe) ; $i++) {  ?>
            <option value="<?php echo $sexe[$i]['idsexe']; ?>" 
                <?php if(isset($defaultData)){ 
                         if($sexe[$i]['idsexe']==$defaultData['sexe']) {
                             echo "selected ";
                            }
                        } ?> >
             <?php echo $sexe[$i]['nomsexe']; ?></option>
            <?php   } ?>
        </select>
        <br>

        <input type="submit" value="Sign in">
    </form>
</div>