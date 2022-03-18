import Swal from "sweetalert2"

export default class AlertService {
    constructor(config = null) {
        this.alert = Swal.mixin({
            ...config,
            customClass: {
                htmlContainer: "rtl"
            }
        })
    }
    fire(config) {
        // {
        //     title,
        //     message = "",
        //     html = "",
        //     icon = "info",
        //     timer = false,
        //     confirmButtonText = 'تایید',
        //     cancelButtonText = 'لغو',
        //     confirmButton = false,
        //     cancelButton = false
        // }
        // {
        //     titleText: title,
        //     message: message,
        //     icon: icon,
        //     timer: timer,
        //     timerProgressBar: true,
        //     html: html,
        //     customClass: {
        //         htmlContainer: "rtl"
        //     },
        //     confirmButtonText,
        //     cancelButtonText
        // }
        this.alert.fire(config)
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