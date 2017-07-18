/**
 *
 * Configuration du module 'MessageBox'
 *
 */

var messageBoxConfig = {
    title : false,
    label : false,
    closeButton: true,
    progressTpl : false,
    onShow : false
};


/**
 *
 * Afficher un messagebox de confirmation
 *
 * @param params
 *
 * Paramètres obligatoires
 *
 * params.msg      : Message à aficher
 * params.callback : Traitement à faire --> confirmation à OUI
 *
 *
 */

function showConfirmBox(params) {

    if(params.msg === undefined){
        return false;
    }

    Lobibox.confirm({
        msg:params.msg,
        callback: function ($this,response) {
            switch (response){
                case 'yes' :
                    params.success();
                    break;
                case 'no' :
                    break;
            }
        },
        title: 'Confirmation',
        customBtnClass: 'btn btn-default',
        buttons: {
            yes: {
                'class': 'btn btn-sm btn-default',
                text: 'Oui',
                closeOnClick: true
            },
            no: {
                'class': 'btn btn-sm btn-default',
                text: 'Non',
                closeOnClick: true
            }
        }
    });
}

/**
 * Afficher un messagebox avec progression
 *
 * @param params
 *
 */

function showProgress(params) {

    if(params.title === undefined || params.label === undefined){
        return false;
    }

    messageBoxConfig.title = params.title;
    messageBoxConfig.label = params.label;

    // template par défaut de progressbar
    var progressTemplate = '<div class="progress">' +
        '<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">' +
        '<span class="sr-only">45% Complete</span>' +
        '</div>'+
        '</div>';

    messageBoxConfig.progressTpl = progressTemplate;

    if(params.progressTpl){
        messageBoxConfig.progressTpl = params.progressTpl;
    }

    if(params.onShow){
        messageBoxConfig.onShow = params.onShow;
    }

    messageBoxConfig.closeButton = false;

    return Lobibox.progress(messageBoxConfig);

}