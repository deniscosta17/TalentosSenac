<?php $this->assign('title', 'Adicionar Usuário'); ?>

<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <h1><i class="fa fa-user-plus"></i> <?= __('Adicionar Usuário') ?></h1>

            <?php echo $this->Form->input('username', ['label' => 'Usuário']); ?>
            <?php echo $this->Form->input('password', ['label' => 'Senha']); ?>

    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
