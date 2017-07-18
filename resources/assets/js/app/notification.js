/**
 *
 * Configuration du module de notification
 *
 */

var notificationConfig = {
    title: false,
    sound: false,
    rounded: false,
    position: 'top right',
    delay: 4000,
    width: 400,
    showAfterPrevious: true
};


/**
 *
 * Afficher une notification
 *
 * @param params
 *
 * Paramètres obligatoires
 *
 * params.type : ['success'|'error'|'info'|'default']
 * params.msg  : Text à afficher dans la notification
 *
 * @returns {boolean}
 *
 */

function showNotification(params){

    if(params.msg === undefined || params.type === undefined ){
        return false;
    }

    notificationConfig.msg = params.msg;

    switch (params.type){
        case 'error' :
            notificationConfig.title = 'Erreur';
            notificationConfig.delay = false;
            break;
        case 'info' :
            notificationConfig.title = 'Information';
            break;
        case 'default' :
            notificationConfig.title = 'Notification';
            break;
        case 'success':
            notificationConfig.title = 'Succès';
            break;
    }

    if(params.onClick){
        notificationConfig.onClick = params.onClick;
    }

    Lobibox.notify(params.type,notificationConfig);

    return true;
}


