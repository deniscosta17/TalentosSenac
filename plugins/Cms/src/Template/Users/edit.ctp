<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <h1><i class="fa fa-user"></i> <?= __('Editar Usuário') ?></h1>

            <?php echo $this->Form->input('username', ['label' => 'Usuário']); ?>
            <?php echo $this->Form->input('password', ['label' => 'Senha', 'value' => '']); ?>

    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
