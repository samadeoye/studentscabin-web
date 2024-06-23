function throwError(msg, position)
{
    if (position == undefined)
    {
        position = '';
    }
    initToastOptions(position);
    toastr.error(msg);
}
function throwInfo(msg, position)
{
    if (position == undefined)
    {
        position = '';
    }
    initToastOptions(position);
    toastr.info(msg);
}
function throwWarning(msg, position)
{
    if (position == undefined)
    {
        position = '';
    }
    initToastOptions(position);
    toastr.warning(msg);
}
function throwSuccess(msg, position)
{
    if (position == undefined)
    {
        position = '';
    }
    initToastOptions(position);
    toastr.success(msg);
}
function initToastOptions(position)
{
    if (position == '')
    {
        toastr.optionsOverride = 'positionclass = "toast-top-right"';
        toastr.options.positionClass = 'toast-top-right';
    }
    else
    {
        toastr.optionsOverride = 'positionclass = "'+position+'"';
        toastr.options.positionClass = position;
    }
    toastr.options.closeButton = true;
    toastr.options.progressBar = true;
}

function enableDisableBtn(id, status)
{
    disable = true;
    if(status == 1) {
        disable = false;
    }
    $(id).attr('disabled', disable);
    if(disable) {
        $(id).append(' <div class="spinner-border text-light spinner-border-sm" role="status"><span class="sr-only">Processing...</span></div>');
    }
    else {
        $('.spinner-border').remove();
    }
}