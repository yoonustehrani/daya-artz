import Swal from "sweetalert2"

export default class AlertService {
    constructor(config = null) {
        this.alert = Swal.mixin()
    }
    fire({
        title,
        message = "",
        html = "",
        icon = "info",
        timer = false,
        confirmButtonText = null,
        cancelButtonText = null,
        confirmButton = false,
        cancelButton = false
    }) {
        this.alert.fire({
            titleText: title,
            icon: icon,
            timer: timer,
            timerProgressBar: true,
            html: html
        })
    }
    success(config)
    {
        this.fire({...config, icon: "success"})
    }
    error(config)
    {
        this.fire({...config, icon: "error"})
    }
    warning(config)
    {
        this.fire({...config, icon: "warning"})
    }
    info(config)
    {
        this.fire({...config, icon: "info"})
    }
    question(config)
    {
        this.fire({...config, icon: "question"})
    }
}