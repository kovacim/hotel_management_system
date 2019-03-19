
        <?= $this->Flash->render(); ?>
            <div class="heading-title">
                 <h3>Sign Up</h3>
            </div>
            <?= $this->Form->create(); ?>
            <?= $this->Form->input('name', ['type'=>'text',  'placeholder'=>'Name', 'required'=>true, 'onfocus'=>'this.placeholder=""', 'onblur'=>'this.placeholder="Name"']); ?>
            <?= $this->Form->input('email', ['type'=>'text',  'placeholder'=>'Email', 'required'=>true, 'onfocus'=>'this.placeholder=""', 'onblur'=>'this.placeholder="Email"']); ?>
            <?= $this->Form->input('password', ['type'=>'password', 'class'=>'fadeIn ', 'placeholder'=>'Password', 'required'=>true, 'onfocus'=>'this.placeholder=""', 'onblur'=>'this.placeholder="Password"']); ?>
            <?= $this->Form->submit('Sign Up', array('class' => 'login-btn ')); ?><br>
            <p>Have an account? <span><?= $this->Html->link('Sign In', ['controller'=>'users', 'action'=>'login']); ?></span></p>


      <?= $this->Form->end(); ?>
