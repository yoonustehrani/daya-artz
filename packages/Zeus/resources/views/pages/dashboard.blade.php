<x-zview-layout-default title="Dashboard">
    <div class="flex flex-wrap justify-between items-stretch w-full">
    {{-- start section 1 --}}
        <div class="w-full lg:w-6/12 mx-auto xl:w-3/12 text-center shadow-xl bg-on-white rounded-lg p-3 my-2 max-w-sm">
            <h1 class="text-red-500 px-2 border-x-2 mb-6 w-fit mx-auto text-2xl font-bold border-red-500">Good Morning</h1>
            <div class="bg-zeus-dashboard-vbg bg-cover bg-center bg-no-repeat">
                <img src="{{ asset('images/zeus-images/dashboard-vector.png') }}" alt="man working with a laptop" class="w-full h-auto">
            </div>
        </div>
        <div class="w-full xl:w-9/12 lg:pl-3 my-2 flex flex-col justify-evenly">
            <div class="flex items-stretch flex-wrap mb-2">
                <div class="w-full md:w-1/2 xl:w-1/4 md:px-2 my-2 xl:my-0">
                    <div class="text-white text-left shadow-xl p-3 rounded-lg h-full bg-emerald-500">
                        <h1 class="text-xl mb-2"><i class="far fa-user mr-2"></i>USERS</h1>
                        <ul class="p-0 list-none text-lg">
                            <li class="my-2">Total Users <span class="font-bold ml-2">3469</span></li>
                            <li class="my-2">Monthly Users <span class="font-bold ml-2">684</span></li>
                        </ul>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/4 md:px-2 my-2 xl:my-0">
                    <div class="text-white text-left shadow-xl p-3 rounded-lg h-full bg-red-500">
                        <h1 class="text-xl mb-2"><i class="far fa-shopping-cart mr-2"></i>ORDERS</h1>
                        <ul class="p-0 list-none text-lg">
                            <li class="my-2">Total Orders <span class="font-bold ml-2">1589</span></li>
                            <li class="my-2">Monthly Orders <span class="font-bold ml-2">239</span></li>
                        </ul>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/4 md:px-2 my-2 xl:my-0">
                    <div class="text-white text-left shadow-xl p-3 rounded-lg h-full bg-amber-400">
                        <h1 class="text-xl mb-2"><i class="far fa-pencil mr-2"></i>IN DESIGN</h1>
                        <ul class="p-0 list-none text-lg">
                            <li class="my-2">Total Users <span class="font-bold ml-2">3469</span></li>
                        </ul>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/4 md:px-2 my-2 xl:my-0">
                    <div class="text-white text-left shadow-xl p-3 rounded-lg h-full bg-sky-400">
                        <h1 class="text-xl mb-2"><i class="far fa-sack-dollar mr-2"></i>INCOME</h1>
                        <ul class="p-0 list-none text-lg">
                            <li class="my-2">Total <span class="font-bold ml-2">36,456,000</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex items-stretch flex-wrap w-full">
                <div class="w-full lg:w-1/2 xl:w-1/3 md:px-2 my-2 xl:my-0">
                    <div class="text-white text-left shadow-xl p-3 rounded-lg h-full bg-amber-400">
                        <h1 class="text-xl mb-2"><i class="far fa-user mr-2"></i>USERS</h1>
                        <ul class="p-0 list-none text-lg grid grid-rows-2 grid-flow-col gap-2">
                            <li>Unpaid <span class="font-bold ml-2">137</span></li>
                            <li>Expired <span class="font-bold ml-2">3</span></li>
                            <li>Inactive <span class="font-bold ml-2">50</span></li>
                            <li>Blank <span class="font-bold ml-2">0</span></li>
                        </ul>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 xl:w-1/3 md:px-2 my-2 xl:my-0">
                    <div class="text-white text-left shadow-xl p-3 rounded-lg h-full bg-sky-400">
                        <h1 class="text-xl mb-2"><i class="far fa-ballot mr-2"></i>BILLS</h1>
                        <ul class="p-0 list-none text-lg grid grid-rows-2 grid-flow-col gap-2">
                            <li>All <span class="font-bold ml-2">16</span></li>
                            <li>New <span class="font-bold ml-2">4</span></li>
                            <li>On Hold <span class="font-bold ml-2">6</span></li>
                            <li>In Progress <span class="font-bold ml-2">21</span></li>
                        </ul>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 xl:w-1/3 md:px-2 my-2 xl:my-0">
                    <div class="text-white text-left shadow-xl p-3 rounded-lg h-full bg-rose-500">
                        <h1 class="text-xl mb-2"><i class="far fa-user-headset mr-2"></i>TICKETS</h1>
                        <ul class="p-0 list-none text-lg grid grid-rows-2 grid-flow-col gap-2">
                            <li>Subscribed <span class="font-bold ml-2">16 k</span></li>
                            <li>Customer <span class="font-bold ml-2">6 k</span></li>
                            <li>Buyer <span class="font-bold ml-2">4 k</span></li>
                            <li>Monthly <span class="font-bold ml-2">10 k</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    {{-- end section 1 --}}
    {{-- start section 2 --}}
        <div class="w-full 2xl:w-8/12 2xl:pr-2 text-slate-500 my-4">
            <div class="shadow-xl bg-on-white p-4 rounded-lg overflow-x-auto">
                <h1 class="text-2xl float-left mb-2 font-bold w-full">Recent Purchases</h1>
                <table class="table-auto text-left simple-table w-full">
                    <thead>
                        <tr>
                            <td>Customer</td>
                            <td>Product</td>
                            <td>Status</td>
                            <td>Payment</td>
                            <td>Amount</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Amir Mansoorian</td>
                            <td>Logo + visit card</td>
                            <td><span class="bg-red-300 rounded-full py-1 px-2 inline-block w-max">Not Started<i class="far fa-times-circle ml-2"></i></span></td>
                            <td><span class="bg-green-300 rounded-full py-1 px-2 inline-block w-max">Paid<i class="far fa-check ml-2"></i></span></td>
                            <td>4,200,000</td>
                        </tr>
                        <tr>
                            <td>Yoonus Tehrani</td>
                            <td>Logo + visit card</td>
                            <td><span class="bg-yellow-300 rounded-full py-1 px-2 inline-block w-max">Not Started<i class="far fa-spinner ml-2"></i></span></td>
                            <td><span class="bg-green-300 rounded-full py-1 px-2 inline-block w-max">Paid<i class="far fa-check ml-2"></i></span></td>
                            <td>4,200,000</td>
                        </tr>                        
                        <tr>
                            <td>Danial Tehrani</td>
                            <td>Logo + visit card</td>
                            <td><span class="bg-green-300 rounded-full py-1 px-2 inline-block w-max">Not Started<i class="far fa-times-circle ml-2"></i></span></td>
                            <td><span class="bg-yellow-300 rounded-full py-1 px-2 inline-block w-max">Paid<i class="far fa-spinner ml-2"></i></span></td>
                            <td>4,200,000</td>
                        </tr>
                        <tr>
                            <td>Yousef Mostaghni</td>
                            <td>Logo + visit card</td>
                            <td><span class="bg-red-300 rounded-full py-1 px-2 inline-block w-max">Not Started<i class="far fa-times-circle ml-2"></i></span></td>
                            <td><span class="bg-green-300 rounded-full py-1 px-2 inline-block w-max">Paid<i class="far fa-check ml-2"></i></span></td>
                            <td>4,200,000</td>
                        </tr>
                        </tr>
                        <tr>
                            <td>Sohrab Mj</td>
                            <td>Logo + visit card</td>
                            <td><span class="bg-green-300 rounded-full py-1 px-2 inline-block w-max">Not Started<i class="far fa-times-circle ml-2"></i></span></td>
                            <td><span class="bg-yellow-300 rounded-full py-1 px-2 inline-block w-max">Paid<i class="far fa-spinner ml-2"></i></span></td>
                            <td>4,200,000</td>
                        </tr>
                        <tr>
                            <td>AliReza Mansoorian</td>
                            <td>Logo + visit card</td>
                            <td><span class="bg-red-300 rounded-full py-1 px-2 inline-block w-max">Not Started<i class="far fa-times-circle ml-2"></i></span></td>
                            <td><span class="bg-green-300 rounded-full py-1 px-2 inline-block w-max">Paid<i class="far fa-check ml-2"></i></span></td>
                            <td>4,200,000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-full 2xl:w-4/12 shadow-xl bg-on-white p-4 text-slate-500 my-4 rounded-lg">
            <h1 class="text-2xl float-left mb-2 font-bold w-full">Notifications</h1>
            <div>
                <div class="my-2 float-left w-full py-2 px-4 rounded-xl flex justify-between items-center bg-rose-300">
                    <span class="p-2 rounded-xl bg-rose-200"><i class="far fa-bell-on text-rose-500"></i></span>
                    <p class="mx-3">A new order is placed</p>
                    <span>2 hours ago</span>
                </div>
                <div class="my-2 float-left w-full py-2 px-4 rounded-xl flex justify-between items-center bg-green-300">
                    <span class="p-2 rounded-xl bg-green-200"><i class="far fa-bell-on text-green-500"></i></span>
                    <p class="mx-3">A new order is placed</p>
                    <span>2 hours ago</span>
                </div>
                <div class="my-2 float-left w-full py-2 px-4 rounded-xl flex justify-between items-center bg-sky-300">
                    <span class="p-2 rounded-xl bg-sky-200"><i class="far fa-bell-on text-sky-500"></i></span>
                    <p class="mx-3">A new order is placed</p>
                    <span>2 hours ago</span>
                </div>
                <div class="my-2 float-left w-full py-2 px-4 rounded-xl flex justify-between items-center bg-yellow-300">
                    <span class="p-2 rounded-xl bg-yellow-200"><i class="far fa-bell-on text-yellow-500"></i></span>
                    <p class="mx-3">A new order is placed</p>
                    <span>2 hours ago</span>
                </div>
                <div class="my-2 float-left w-full py-2 px-4 rounded-xl flex justify-between items-center bg-red-300">
                    <span class="p-2 rounded-xl bg-red-200"><i class="far fa-bell-on text-red-500"></i></span>
                    <p class="mx-3">A new order is placed</p>
                    <span>2 hours ago</span>
                </div>
            </div>
        </div>
    {{-- end setion 2 --}}
    {{-- start section 3 --}}
        <div class="w-full 4k:w-8/12 4k:pr-2 text-slate-500 my-4">
            <div class="shadow-xl bg-on-white rounded-lg p-4 h-full overflow-x-auto">
                <h1 class="text-2xl float-left mb-2 font-bold w-full">Transactions</h1>
                <table class="table-auto text-left w-full simple-table">
                    <thead>
                        <tr>
                            <td>Customer</td>
                            <td>Method</td>
                            <td>Amount</td>
                            <td>Date</td>
                            <td>Invoice</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Amir Mansoorian</td>
                            <td>Zarin paal</td>
                            <td>4,200,000</td>
                            <td>2022/3/23-15:30</td>
                            <td>#7a3s9g5</td>
                        </tr>
                        <tr>
                            <td>Yoonus Tehrani</td>
                            <td>Zarin paal</td>
                            <td>4,200,000</td>
                            <td>2022/3/23-15:30</td>
                            <td>#7a3s9g5</td>
                        </tr>
                        <tr>
                            <td>Danial Tehrani</td>
                            <td>Direct Payment</td>
                            <td>4,200,000</td>
                            <td>2022/3/23-15:30</td>
                            <td>#7a3s9g5</td>
                        </tr>
                        <tr>
                            <td>Yousef Mostaghni</td>
                            <td>Zarin paal</td>
                            <td>4,200,000</td>
                            <td>2022/3/23-15:30</td>
                            <td>#7a3s9g5</td>
                        </tr>
                        </tr>
                        <tr>
                            <td>Sohrab Mj</td>
                            <td>Direct Payment</td>
                            <td>4,200,000</td>
                            <td>2022/3/23-15:30</td>
                            <td>#7a3s9g5</td>
                        </tr>
                        <tr>
                            <td>AliReza Mansoorian</td>
                            <td>Zarin paal</td>
                            <td>4,200,000</td>
                            <td>2022/3/23-15:30</td>
                            <td>#7a3s9g5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-full lg:w-9/12 xl:w-8/12 4k:w-4/12 lg:pr-2 text-slate-500 my-4">
            <div class="shadow-xl bg-on-white rounded-lg p-4 h-full overflow-x-auto">
                <h1 class="text-2xl float-left mb-2 font-bold w-full">Activities</h1>
                <table class="table-auto text-left w-full simple-table">
                    <tbody>
                        <tr>
                            <td>10 minutes ago</td>
                            <td><i class="far fa-circle text-green-500"></i></td>
                            <td>Amir Mnasoorian</td>
                            <td>Change order No.3454adf</td>
                        </tr>
                        <tr>
                            <td>50 minutes ago</td>
                            <td><i class="far fa-circle text-sky-500"></i></td>
                            <td>Yoonus Tehrani</td>
                            <td>Set new Admin</td>
                        </tr>
                        <tr>
                            <td>4 days ago</td>
                            <td><i class="far fa-circle text-yellow-500"></i></td>
                            <td>Ali Mnasoorian</td>
                            <td>Fucke Allah</td>
                        </tr>
                        <tr>
                            <td>50 minutes ago</td>
                            <td><i class="far fa-circle text-rose-500"></i></td>
                            <td>Yousef Mostaghni</td>
                            <td>Set new Admin</td>
                        </tr>
                        <tr>
                            <td>2 hours ago</td>
                            <td><i class="far fa-circle text-sky-500"></i></td>
                            <td>Dani Tehrani</td>
                            <td>Set new Admin</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-full lg:w-3/12 xl:w-4/12 4k:w-full shadow-xl bg-on-white p-4 text-slate-500 my-4 rounded-lg">
            <div class="flex flex-wrap justify-between items-center">
                <div class="my-2 w-full 2xl:w-[48%] 4k:w-[15%] py-2 px-4 rounded-xl flex justify-between items-center bg-yellow-300">
                    <span class="p-2 rounded-xl bg-yellow-200"><i class="far fa-phone text-yellow-500"></i></span>
                    <p>Website</p>
                    <span>10%</span>
                </div>
                <div class="my-2 w-full 2xl:w-[48%] 4k:w-[15%] py-2 px-4 rounded-xl flex justify-between items-center bg-rose-300">
                    <span class="p-2 rounded-xl bg-rose-200"><i class="far fa-globe text-rose-500"></i></span>
                    <p>Phone</p>
                    <span>15%</span>
                </div>
                <div class="my-2 w-full 2xl:w-[48%] 4k:w-[15%] py-2 px-4 rounded-xl flex justify-between items-center bg-indigo-300">
                    <span class="p-2 rounded-xl bg-indigo-200"><i class="far fa-robot text-indigo-500"></i></span>
                    <p>Bot</p>
                    <span>10%</span>
                </div>
                <div class="my-2 w-full 2xl:w-[48%] 4k:w-[15%] py-2 px-4 rounded-xl flex justify-between items-center bg-green-300">
                    <span class="p-2 rounded-xl bg-green-200"><i class="fab fa-whatsapp text-social-media-whatsapp"></i></span>
                    <p>WhatsApp</p>
                    <span>25%</span>
                </div>
                <div class="my-2 w-full 2xl:w-[48%] 4k:w-[15%] py-2 px-4 rounded-xl flex justify-between items-center bg-sky-300">
                    <span class="p-2 rounded-xl bg-sky-200"><i class="fab fa-telegram text-social-media-telegram"></i></span>
                    <p>Telegram</p>
                    <span>10%</span>
                </div>
                <div class="my-2 w-full 2xl:w-[48%] 4k:w-[15%] p-2 rounded-xl flex justify-between items-center bg-sky-300">
                    <span class="p-2 rounded-xl bg-sky-200"><i class="fab fa-instagram text-social-media-instagram"></i></span>
                    <p>Instagram</p>
                    <span>20%</span>
                </div>
            </div>
        </div>
    {{-- end section 3 --}}
    </div>
</x-zview-layout-default>