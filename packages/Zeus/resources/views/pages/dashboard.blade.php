<x-zview-layout-default title="Dashboard">
    <div class="flex flex-wrap justify-between items-stretch w-full">
        {{-- start section 1 --}}
        <div class="w-full md:w-4/12 text-center shadow-xl bg-on-white">
            <h1 class="text-red-500 px-2 border-x-2 mb-2">Good Morning</h1>
            <img class="w-full h-auto" src="{{ asset('images/zeus-images/welcome-sticker.png') }}" alt="">
        </div>
        <div class="w-full md:w-8/12 pl-3">
            <div class="flex items-stretch">
                <div class="w-full md:w-1/4 px-2">
                    <div class="text-white text-left shadow-xl p-2 bg-emerald-500">
                        <span class="text-2xl mb-2"><i class="far fa-user mr-2"></i>USERS</span>
                        <ul class="p-0 list-none text-lg">
                            <li class="my-2">Total Users <span class="font-bold ml-2">3469</span></li>
                            <li class="my-2">Monthly Users <span class="font-bold ml-2">684</span></li>
                        </ul>
                    </div>
                </div>
                <div class="w-full md:w-1/4 px-2">
                    <div class="text-white text-left shadow-xl p-2 bg-red-500">
                        <span class="text-2xl mb-2"><i class="far fa-shopping-card mr-2"></i>ORDERS</span>
                        <ul class="p-0 list-none text-lg">
                            <li class="my-2">Total Orders <span class="font-bold ml-2">1589</span></li>
                            <li class="my-2">Monthly Orders <span class="font-bold ml-2">239</span></li>
                        </ul>
                    </div>
                </div>
                <div class="w-full md:w-1/4 px-2">
                    <div class="text-white text-left shadow-xl p-2 bg-amber-400">
                        <span class="text-2xl mb-2"><i class="far fa-pencil mr-2"></i>IN DESIGN</span>
                        <ul class="p-0 list-none text-lg">
                            <li class="my-2">Total Users <span class="font-bold ml-2">3469</span></li>
                        </ul>
                    </div>
                </div>
                <div class="w-full md:w-1/4 px-2">
                    <div class="text-white text-left shadow-xl p-2 bg-sky-400">
                        <span class="text-2xl mb-2"><i class="far fa-sack-dollar mr-2"></i>INCOME</span>
                        <ul class="p-0 list-none text-lg">
                            <li class="my-2 inline-block w-1/2">Subscribed <span class="font-bold ml-2">16 k</span></li>
                            <li class="my-2 inline-block w-1/2">Buyer <span class="font-bold ml-2">4 k</span></li>
                            <li class="my-2 inline-block w-1/2">Customer <span class="font-bold ml-2">6 k</span></li>
                            <li class="my-2 inline-block w-1/2">Monthly <span class="font-bold ml-2">10 k</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex items-stretch w-full">
                <div class="w-full md:w-1/3 px-2">
                    <div class="text-white text-left shadow-xl p-2 bg-amber-400">
                        <span class="text-2xl mb-2"><i class="far fa-user mr-2"></i>USERS</span>
                        <ul class="p-0 list-none text-lg">
                            <li class="my-2 inline-block w-1/2">Unpaid <span class="font-bold ml-2">137</span></li>
                            <li class="my-2 inline-block w-1/2">Expired <span class="font-bold ml-2">3</span></li>
                            <li class="my-2 inline-block w-1/2">Inactive <span class="font-bold ml-2">50</span></li>
                            <li class="my-2 inline-block w-1/2">Blank <span class="font-bold ml-2">0</span></li>
                        </ul>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-2">
                    <div class="text-white text-left shadow-xl p-2 bg-sky-400">
                        <span class="text-2xl mb-2"><i class="far fa-ballot mr-2"></i>BILLS</span>
                        <ul class="p-0 list-none text-lg">
                            <li class="my-2 inline-block w-1/2">All <span class="font-bold ml-2">16</span></li>
                            <li class="my-2 inline-block w-1/2">New <span class="font-bold ml-2">4</span></li>
                            <li class="my-2 inline-block w-1/2">On Hold <span class="font-bold ml-2">6</span></li>
                            <li class="my-2 inline-block w-1/2">In Progress <span class="font-bold ml-2">21</span></li>
                        </ul>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-2">
                    <div class="text-white text-left shadow-xl p-2 bg-rose-500">
                        <span class="text-2xl mb-2"><i class="far fa-user-headset mr-2"></i>TICKETS</span>
                        <ul class="p-0 list-none text-lg">
                            <li class="my-2 inline-block w-1/2">Subscribed <span class="font-bold ml-2">16 k</span></li>
                            <li class="my-2 inline-block w-1/2">Buyer <span class="font-bold ml-2">4 k</span></li>
                            <li class="my-2 inline-block w-1/2">Customer <span class="font-bold ml-2">6 k</span></li>
                            <li class="my-2 inline-block w-1/2">Monthly <span class="font-bold ml-2">10 k</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
     {{-- end section 1 --}}
    {{-- start section 2 --}}
        <div class="w-full md:w-7/12 pr-2 text-slate-500">
            <div class="shadow-xl bg-on-white p-2">
                <h1 class="text-2xl float-left mb-2 font-bold">Recent Purchases</h1>
                <table class="table-auto text-left">
                    <thead>
                        <tr class="font-bold">
                            <td>Customer</td>
                            <td>Product</td>
                            <td>Status</td>
                            <td>Payment</td>
                            <td>Amount</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="my-2">
                            <td>Amir Mansoorian</td>
                            <td>Logo + visit card</td>
                            <td><span class="bg-red-400 p-1">Not Started<i class="far fa-times-circle ml-2"></i></span></td>
                            <td><span class="bg-green-400 p-1">Paid<i class="far fa-check ml-2"></i></span></td>
                            <td>4,200,000</td>
                        </tr>
                        <tr class="my-2">
                            <td>Yoonus Tehrani</td>
                            <td>Logo + visit card</td>
                            <td><span class="bg-yellow-400 p-1">Not Started<i class="far fa-spinner ml-2"></i></span></td>
                            <td><span class="bg-green-400 p-1">Paid<i class="far fa-check ml-2"></i></span></td>
                            <td>4,200,000</td>
                        </tr>                        
                        <tr class="my-2">
                            <td>Danial Tehrani</td>
                            <td>Logo + visit card</td>
                            <td><span class="bg-green-400 p-1">Not Started<i class="far fa-times-circle ml-2"></i></span></td>
                            <td><span class="bg-yellow-400 p-1">Paid<i class="far fa-spinner ml-2"></i></span></td>
                            <td>4,200,000</td>
                        </tr>
                        <tr class="my-2">
                            <td>Yousef Mostaghni</td>
                            <td>Logo + visit card</td>
                            <td><span class="bg-red-400 p-1">Not Started<i class="far fa-times-circle ml-2"></i></span></td>
                            <td><span class="bg-green-400 p-1">Paid<i class="far fa-check ml-2"></i></span></td>
                            <td>4,200,000</td>
                        </tr>
                        </tr>
                        <tr class="my-2">
                            <td>Sohrab Mj</td>
                            <td>Logo + visit card</td>
                            <td><span class="bg-green-400 p-1">Not Started<i class="far fa-times-circle ml-2"></i></span></td>
                            <td><span class="bg-yellow-400 p-1">Paid<i class="far fa-spinner ml-2"></i></span></td>
                            <td>4,200,000</td>
                        </tr>
                        <tr class="my-2">
                            <td>AliReza Mansoorian</td>
                            <td>Logo + visit card</td>
                            <td><span class="bg-red-400 p-1">Not Started<i class="far fa-times-circle ml-2"></i></span></td>
                            <td><span class="bg-green-400 p-1">Paid<i class="far fa-check ml-2"></i></span></td>
                            <td>4,200,000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-full m:w-5/12 shadow-xl bg-on-white p-2 text-slate-500">
            <h1 class="text-2xl float-left mb-2 font-bold">Notifications</h1>
            <div>
                <div class="my-2 p-2 rounded-xl flex justify-between items-center bg-rose-400">
                    <span class="p-2 rounded-xl bg-rose-200"><i class="far fa-bell-on bg-rose-500"></i></span>
                    <p>A new order is placed</p>
                    <span>2 hours ago</span>
                </div>
                <div class="my-2 p-2 rounded-xl flex justify-between items-center bg-green-400">
                    <span class="p-2 rounded-xl bg-green-200"><i class="far fa-bell-on bg-green-500"></i></span>
                    <p>A new order is placed</p>
                    <span>2 hours ago</span>
                </div>
                <div class="my-2 p-2 rounded-xl flex justify-between items-center bg-sky-400">
                    <span class="p-2 rounded-xl bg-sky-200"><i class="far fa-bell-on bg-sky-500"></i></span>
                    <p>A new order is placed</p>
                    <span>2 hours ago</span>
                </div>
                <div class="my-2 p-2 rounded-xl flex justify-between items-center bg-yellow-400">
                    <span class="p-2 rounded-xl bg-yellow-200"><i class="far fa-bell-on bg-yellow-500"></i></span>
                    <p>A new order is placed</p>
                    <span>2 hours ago</span>
                </div>
                <div class="my-2 p-2 rounded-xl flex justify-between items-center bg-red-400">
                    <span class="p-2 rounded-xl bg-red-200"><i class="far fa-bell-on bg-red-500"></i></span>
                    <p>A new order is placed</p>
                    <span>2 hours ago</span>
                </div>
            </div>
        </div>
     {{-- end setion 2 --}}
     {{-- start section 3 --}}
        <div class="w-full m:w-6/12 pr-2 text-slate-500">
            <div class="shadow-xl bg-on-white">
                <h1 class="text-2xl float-left mb-2 font-bold">Transactions</h1>
                <table class="table-auto text-left">
                    <thead>
                        <tr class="font-bold">
                            <td>Customer</td>
                            <td>Method</td>
                            <td>Amount</td>
                            <td>Date</td>
                            <td>Invoice</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="my-2">
                            <td>Amir Mansoorian</td>
                            <td>Zarin paal</td>
                            <td>4,200,000</td>
                            <td>2022/3/23-15:30</td>
                            <td>#7a3s9g5</td>
                        </tr>
                        <tr class="my-2">
                            <td>Yoonus Tehrani</td>
                            <td>Zarin paal</td>
                            <td>4,200,000</td>
                            <td>2022/3/23-15:30</td>
                            <td>#7a3s9g5</td>
                        </tr>
                        <tr class="my-2">
                            <td>Danial Tehrani</td>
                            <td>Direct Payment</td>
                            <td>4,200,000</td>
                            <td>2022/3/23-15:30</td>
                            <td>#7a3s9g5</td>
                        </tr>
                        <tr class="my-2">
                            <td>Yousef Mostaghni</td>
                            <td>Zarin paal</td>
                            <td>4,200,000</td>
                            <td>2022/3/23-15:30</td>
                            <td>#7a3s9g5</td>
                        </tr>
                        </tr>
                        <tr class="my-2">
                            <td>Sohrab Mj</td>
                            <td>Direct Payment</td>
                            <td>4,200,000</td>
                            <td>2022/3/23-15:30</td>
                            <td>#7a3s9g5</td>
                        </tr>
                        <tr class="my-2">
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
        <div class="w-full m:w-4/12 pr-2 text-slate-500">
            <div class="shadow-xl bg-on-white">
                <h1 class="text-2xl float-left mb-2 font-bold">Activities</h1>
                <table class="table-auto text-left">
                    <tbody>
                        <tr class="my-2">
                            <td>10 minutes ago</td>
                            <td><i class="far fa-circle text-green-500"></i></td>
                            <td>Amir Mnasoorian</td>
                            <td>Change order No.3454adf</td>
                        </tr>
                        <tr class="my-2">
                            <td>50 minutes ago</td>
                            <td><i class="far fa-circle text-sky-500"></i></td>
                            <td>Yoonus Tehrani</td>
                            <td>Set new Admin</td>
                        </tr>
                        <tr class="my-2">
                            <td>4 days ago</td>
                            <td><i class="far fa-circle text-yellow-500"></i></td>
                            <td>Ali Mnasoorian</td>
                            <td>Fucke Allah</td>
                        </tr>
                        <tr class="my-2">
                            <td>50 minutes ago</td>
                            <td><i class="far fa-circle text-rose-500"></i></td>
                            <td>Yousef Mostaghni</td>
                            <td>Set new Admin</td>
                        </tr>
                        <tr class="my-2">
                            <td>2 hours ago</td>
                            <td><i class="far fa-circle text-sky-500"></i></td>
                            <td>Dani Tehrani</td>
                            <td>Set new Admin</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-full m:w-2/12 shadow-xl bg-on-white p-2 text-slate-500">
            <div class="my-2 w-2/5 p-2 rounded-xl flex justify-between items-center bg-yellow-400">
                <span class="p-2 rounded-xl bg-yellow-200"><i class="far fa-phone bg-yellow-500"></i></span>
                <p>Website</p>
                <span>10%</span>
            </div>
            <div class="flex flex-wrap justify-between items-center">
                <div class="my-2 w-2/5 p-2 rounded-xl flex justify-between items-center bg-green-400">
                    <span class="p-2 rounded-xl bg-green-200"><i class="fab fa-whatsapp bg-social-media-whatsapp"></i></span>
                    <p>Bot</p>
                    <span>25%</span>
                </div>
                <div class="my-2 w-2/5 p-2 rounded-xl flex justify-between items-center bg-sky-400">
                    <span class="p-2 rounded-xl bg-sky-200"><i class="far fa-robot bg-social-media-telegram"></i></span>
                    <p>Social Media</p>
                    <span>40%</span>
                </div>
                <div class="my-2 w-2/5 p-2 rounded-xl flex justify-between items-center bg-rose-400">
                    <span class="p-2 rounded-xl bg-rose-200"><i class="far fa-globe bg-rose-500"></i></span>
                    <p>Phone</p>
                    <span>15%</span>
                </div>
            </div>
        </div>
     {{-- end section 3 --}}
    </div>
</x-zview-layout-default>