<?php echo $this->Form->create("Admin"); ?>
<?php echo $this->Form->input("username", ['label' => 'E-mail']); ?>
<?php echo $this->Form->input("password", ['label' => 'Senha']); ?>

<div class="form-group">
    <button type="submit" class="btn btn-primary btn-block">Entrar</button>
</div>
<?php echo $this->Form->end(); ?>