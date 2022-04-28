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

export const normal = (placeholder="") => ({
    width: "100%",
    dir: "rtl",
    placeholder: placeholder
})

export const department_select = {
    width: "100%",
    dir: "rtl",
    placeholder: "بخش مربوطه",
    templateResult: (dep) => {
        if (!dep.title) {
            return dep.text
        }
        return $(
            `<span class="font-bold">${dep.text}</span><p class="font-12">${dep.title}</p>`
        )
    }
}