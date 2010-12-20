<div class="pages view">
    <h1>Contact Us</h2>
    
    <p>Complete the form below and we will get back to you as soon as possible.</p>
    <?php
        echo $form->create('Contact', array('action'=>'contact'));
        echo $form->input('name', array('label'=>'Your name'));
        echo $form->input('email', array('label'=>'Email address'));
        echo $form->input('subject', array('label'=>'Summarize your question/problem in one sentence'));
        echo $form->input('message', array('type'=>'textarea', 'label'=>'Tell us all about it, please be as descriptive as possible'));

        //create the reCAPTCHA form.
        $recaptcha->display_form('echo');

        echo $form->end('Send message'); 
    ?>
</div>