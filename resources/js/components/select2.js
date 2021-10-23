export const state_select = {
    templateResult: (state) => {
        if(!state.id) {
            return state.text
        }
        let baseUrl = `${APP_PATH}images/world-icons/`
        let $state = $(
        `<span class="span-option"><img src=${baseUrl + state.id.toLowerCase() + ".svg"} class="img-flag"/>${state.text}</span>`)
        return $state
    },
    width: "100%",
    dir: "rtl",
    dropdownAutoWidth: true,
}   

export const normal = {
    width: "100%",
    dir: "rtl",
}