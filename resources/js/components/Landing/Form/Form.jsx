const { Component } = require("react");

class Form extends Component
{
    constructor(props) {
        super(props)
        this.state = {
            data: {
                position: '',
                fullname: '',
                phone_number: '',
                description: ''
            },
            form: {
                positions: [
                    {name: 'owner', title: 'صاحب کسب و کار', icon: 'fas fa-user-tie'},
                    {name: 'manager', title: 'مدیر / مسئول شرکت', icon: 'fas fa-briefcase'},
                    {name: 'idea', title: 'صاحب ایده کسب و کار', icon: 'fas fa-lightbulb'}
                ],
            },
            placeholder: `هدف فعلی تبلیغاتی/برندینگ که دغدغه شما یا سازمان تان است را شرح دهید.
- برای مثال:‌ من قصد افزایش فروش رستوران خود را با ارتقا سطح برند خود دارم`
        }
        this.inactiveClassNames = 'border-gray-500 ring-transparent'
        this.activeClassNames = 'border-purple-500 ring-purple-400'
    }

    handleItemSelect = name => {
        this.setState(prevState => ({
            data: {...prevState, position: name}
        }))
    }

    render() {
        return (
            <div className="grid grid-cols-2 gap-8 h-full w-full xl:w-3/4 my-2 md:my-4 bg-white shadow-lg rounded-md p-6">
                <div className="col-span-2 grid grid-cols-2 sm:grid-cols-3 gap-8 h-fit">
                    <p className="col-span-full font-semibold text-lg">- مسئولیت شما در کسب و کارتان کدام یک از موارد زیر است؟</p>
                    {this.state.form.positions.map(position => (
                        <div key={position.name} onClick={() => this.handleItemSelect(position.name)} className={`${position.name === this.state.data.position ? this.activeClassNames : this.inactiveClassNames} flex flex-col items-center justify-center aspect-square border-2 rounded-md p-0 md:p-3 relative ring-4 duration-300 hover:border-purple-500 hover:ring-purple-400 cursor-pointer`}>
                            {position.name === this.state.data.position && (
                                <span className="absolute text-md z-10 top-2 left-2 w-8 h-8 bg-purple-300 grid place-items-center rounded-full">
                                    <i className="fas fa-check"></i>
                                </span>
                            )}
                            <span className="text-4xl"><i className={position.icon}></i></span>
                            <span className="mt-4 text-lg text-gray-600 text-center">{position.title}</span>
                        </div>
                    ))}
                </div>
                <div className="col-span-full lg:col-span-1">
                    <p className="font-semibold text-lg">- نام و  نام خانوادگی</p>
                    <input type="text" className="w-full p-3 mt-3 rounded-md border-2 border-gray-400 outline-none focus:border-purple-500 ring-4 ring-transparent focus:ring-purple-200 duration-300" />
                </div>
                <div className="col-span-full lg:col-span-1">
                    <p className="font-semibold text-lg">- شماره تماس</p>
                    <input type="text" className="w-full p-3 mt-3 rounded-md border-2 border-gray-400 outline-none focus:border-purple-500 ring-4 ring-transparent focus:ring-purple-200 duration-300" style={{ direction: 'ltr' }} />
                </div>
                <div className="col-span-full">
                    <p className="font-semibold text-lg">- هدف تبلیغاتی یا برند سازی شما</p>
                    <textarea className="w-full p-3 mt-3 rounded-md border-2 border-gray-400 outline-none focus:border-purple-500 ring-4 ring-transparent focus:ring-purple-200 duration-300" cols="30" rows="10" placeholder={this.state.placeholder}></textarea>
                </div>
            </div>
        )
    }
}

export default Form;