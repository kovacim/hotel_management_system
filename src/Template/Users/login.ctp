<?= $this->Flash->render(); ?>
            <div class="heading-title">
                 <h3>Sign In</h3>
            </div>
            <?= $this->Form->create(); ?>
            <?= $this->Form->input('email', ['type'=>'text',  'placeholder'=>'Email', 'required'=>true, 'onfocus'=>'this.placeholder=""', 'onblur'=>'this.placeholder="Email"']); ?>
            <?= $this->Form->input('password', ['type'=>'password', 'class'=>'fadeIn ', 'placeholder'=>'Password', 'required'=>true, 'onfocus'=>'this.placeholder=""', 'onblur'=>'this.placeholder="Password"']); ?>
            <?= $this->Form->submit('Sign In', array('class' => 'login-btn ')); ?><br>
            <p>Don't have an account? <span><?= $this->Html->link('Sign Up', ['controller'=>'users', 'action'=>'register']); ?></span></p>


      <?= $this->Form->end(); ?>