<?php Assets::js_tag("task", "lib.js"); ?>
<form id="add-task-form" class="formtastic" action="task/add" >
    <div class="module_content">
        <div class="content-form">
            <fieldset class="column_left">
                <label for="task_name">Tarea</label>
                <input type="hidden" name="task[parent]" value="<?php echo $pid; ?>" />
                <input class="large required" id="task_name" name="task[name]" type="text" />            
            </fieldset>
            
            <fieldset class="column_right">
                <label for="task_user_to">Para</label>
                <select class="large required" id="task_user_to" name="task[user_to]">
                    <option value="1">Erick Torres</option>
                </select>
            </fieldset>
            <fieldset class="break"></fieldset>
            <fieldset class="column_all">
                <label for="task_description">Descripción</label>
                <textarea class="large required" id="task_description" name="task[description]" rows="3" cols="50"></textarea> 
            </fieldset>
            
            <fieldset class="column_left">
                <label for="task_priority">Prioridad</label>
                <select class="large required" id="task_priority" name="task[priority]">
                    <option value="low">Baja</option>
                    <option value="medium">Media</option>
                    <option value="high">Alta</option>
                </select>           
            </fieldset>
            
            <fieldset class="column_right">
                <label for="task_percent">Avance inicial(%)</label>
                <input class="large required" id="task_percent" name="task[percent]" type="text" />  
            </fieldset>
            <fieldset class="break"></fieldset>
            <fieldset class="column_left">
                <label for="task_date_start">Inicio</label>
                <input class="large required" type="text" id="task_date_start" name="task[date_start]" />  
            </fieldset>
            
            <fieldset class="column_right">
                <label for="task_date_end">Finalización</label>
                <input class="large" id="task_date_end" name="task[date_end]" type="text" />  
            </fieldset>
        </div>
        
        
            <!--
        <fieldset class="form-content-col form-content-col-3">

            <div class="form-column-1">
                <h1>Parent ID: <?php echo $pid; ?></h1>
                <input type="hidden" name="task[parent]" value="<?php echo $pid; ?>" />
            </div>
            <div class="form-column-2">
                <label for="task_name">Tarea</label>
                <input class="large required" id="task_name" name="task[name]" type="text" />

                <label for="task_description">Descripción</label>
                <textarea class="large required" id="task_description" name="task[description]" rows="10" cols="100"></textarea> 
            </div>

            <div class="form-column-2">
                

                

                <label for="task_date_start">Fecha de inicio</label>
                <input class="small required" type="text" id="task_date_start" name="task[date_start]" />
            </div>
        </fieldset>-->

    </div>
    <div class="clear"></div>
    <footer>
        <div class="submit_link">
            <input type="submit" value="Agregar" class="alt_btn" />
            <a class="cancel" href="javascript:void(0);" onclick="clean_remote_content(this);">Cancelar</a>
        </div>
    </footer>

</form>