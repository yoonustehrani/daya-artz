import AlertService from "../services/AlertService";

export default function copyToClipboard(code, title="متن مورد نظر") {
    navigator.permissions.query({name: "clipboard-write"}).then(result => {
        if (result.state == "granted" || result.state == "prompt") {
            navigator.clipboard.writeText(code).then(function() {
                (new AlertService).success({timer: 2000, title: `${title} در حافظه موقت کپی شد`})
            }, () => {
                (new AlertService).error({timer: 2000, title: 'متاسفانه در هنگام کپی مشکلی پیش آمد'})
            });
        }
    });
}