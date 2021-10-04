export class state_select {
    format = (state) => {
        if(!state.id) {
            return state.text
        }
        let baseUrl = `${APP_PATH}images/world-icons/`
        let $state = $(
        `<span class="span-option"><img src=${baseUrl + state.id.toLowerCase() + ".svg"} class="img-flag"/>${state.text}</span>`)
        return $state
    }
    config = {
        templateResult: format,
        width: "100%",
        dir: "rtl"
    }   
}