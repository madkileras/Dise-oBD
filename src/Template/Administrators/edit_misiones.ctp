
    <?= $this->Form->create($mission) ?>
    <fieldset>
        <legend><?= __('Editar Misión') ?></legend>
        <?php
            echo $this->Form->input('emergency_id', ['options' => $emergencies]);
            echo $this->Form->input('start_date', ['empty' => true]);
            echo $this->Form->input('finish_date', ['empty' => true]);
            echo $this->Form->input('region_mission');
            echo $this->Form->input('name');
            echo $this->Form->input('description');
   
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
