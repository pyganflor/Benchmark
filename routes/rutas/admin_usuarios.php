<?php

    Route::get('admin_usuarios','UsuarioController@inicio');
    Route::post('enviar_correo','UsuarioController@enviarCorreo');
    Route::post('actualizar_accesos','UsuarioController@actualziaAccesos');
