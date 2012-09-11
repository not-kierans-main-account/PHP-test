<div id='content'>
    <div class='header'>
        <!-- HEADER -->
        <div class='headerImg'></div>
    </div>
    <div class='topcurve'></div>
    <?php if (!$like) { echo "<div class='likeArrow'></div>"; } else { echo ''; }; ?>
    <div class='form'>
        <!-- FORM -->
        <h1><?php echo $header1; ?></h1>
        <p class='copy'>
            <?php echo $copyDeck; ?>
        </p>
        <p class='mugshot'>
        <?php echo $this -> Html -> image ('assets/mugshot.jpg', array('alt' => 'product', 'width' => 130, 'height' => 170)); ?>
        </p>
        <?php echo $this->Form->create('enterForm', array('url' => 'saveData', 'id' => 'enterForm')); ?>
            <?php if ($progress == 1) { ?>
            
                <h1>Thank you for your entry. <a href="/">Enter Again</a></h1>
            <?php } else { ?>
            
                <ul class='clear'>
                    <li>
                        <label for="name">your name: <span class='red'>*</span></label>
                    </li>
                    <li>
                        <label for="email">your email address: <span class='red'>*</span>
                        </label>
                    </li>
    
                </ul>
    
                <ul class='inputFields'>
                    <li>
                        <input type='text' name='name' id='name' value='<?php echo $oldName; ?>' />
                        <?php if ($errors['name']){ echo '<p class="error-msg">'.$errors['name'][0].'</p>'; } ?>
                    </li>
                                        
    
                    <li>
                        <input type='text' name='email' id='email' value='<?php echo $oldEmail; ?>' />
                        <?php if ($errors['email']){ echo '<p class="error-msg">'.$errors['email'][0].'</p>'; } ?>
                    </li>
                    <li class='reqCopy'>
                        * These fields are required
                    </li>
                    <li class='checkbox'>
                        <input id='checkbox' type="checkbox" name="tnc" value="1" id="tnc" /><label for="tnc">I have read and understood the trivia below.</label>
                        <?php if ($errors['terms']){ echo '<p class="error-msg">'.$errors['terms'][0].'</p>'; } ?>
                    </li>
                    <li class="RegisterErrors">
                        <!-- Validation errors -->
                    </li>
                    <li>
                        <input type="image" id="submit" name="data[enterForm][submit]" src="/img/buttons/<?php echo $buttonColour; ?>Button.png" class="picture" alt='Submit your entry ' <?php echo $btnStatus; ?>/><br />
                    </li>
                    <li class='btnCopy'>
                        <?php echo $buttonCopy; ?>
                    </li>
                </ul>
            
            <?php } ?>
        <?php echo $this -> Form -> end(); ?>
        <p class='btmCTA'>Haven't seen this film yet? Why not <a href='http://www.imdb.com/title/tt0091949/' title='read about it here' target='blank'>read about it here</a>.</p>
    </div>
    <div class='bottomcurve'></div>
</div>
<div class='footer'>
    <!-- FOOTER -->
    <?php echo $this -> element ('footer'); ?>
</div>