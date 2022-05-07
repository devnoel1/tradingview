<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Education extends Component
{

    public $type_of_id;
    public $front;
    public $back;
    public $profile;
    public $educationCategory = true;
    public $technicalCategory = false;
    public $fundamentalCategory = false;
    public $riskCategory = false;
    // public $videoModal = false;
    public $educationData;
    
    public $techData = array(
        [  'title' => 'Fundamental Analysis vs Technical Analysis',
            'description' => 'There are many factors that traders look at and analyze when choosing a contract to trade. Some traders might look for trends on a chart while other traders might look to see if demand might be increasing for a commodity.',
            'srcId' => 'tWvnAfT4yAk'
        ],
        [  'title' => 'Candlestick, Line, Bar',
            'description' => 'Trading charts are essential to technical analysis in the financial markets as they provide the foundation of the entire study. They are the means to view price moves in a visual way and form the backdrop on which you can place various indicators to help you make decisions.',
            'srcId' => 'DUMPAEL9re8'
        ],
        [  'title' => 'Understanding Moving Averages',
            'description' => 'Moving averages are a common way for technical traders to begin the process of price analysis. It is often one of the first indicators that traders will add to their charts and will serve as a measure on its own or in comparison with other indicators.',
            'srcId' => '57-LfRkVTwo'
        ],
        [  'title' => 'Technical patterns: Reversals',
            'description' => 'Technical analysts may look at patterns in price to determine whether a trend will continue or if a reversal in trend is possible.',
            'srcId' => '0FbDT2NkYso'
        ],
        [  'title' => 'Support and resistance',
            'description' => 'Support and resistance are common terms that traders use to describe levels where price is more likely to stop moving in one direction or change direction.',
            'srcId' => '7XlqsrvXPLQ'
        ],
        [  'title' => 'Trend and continuation patterns',
            'description' => 'Technical analysts look for certain types of patterns that generally indicate that a market will reverse or continue moving in a certain direction.',
            'srcId' => '4s4XYddp0tg'
        ]
    );
    public $fundData = array(
        [  'title' => 'What is Fundamental Analysis?',
            'description' => 'Stock analyst will use the financial information of a company to help determine its health.',
            'srcId' => 'nn41ZUnjRpw'
        ],
        [  'title' => 'Fundamentals and Energy Futures',
            'description' => 'Energy products are varied and have many end uses.',
            'srcId' => 'l18oHcmf5G0'
        ],
        [  'title' => 'Fundamental and Interest Rate Futures',
            'description' => 'When it comes to trading interest rate futures have a variety of products to choose from.',
            'srcId' => 'EKzqjExT05o'
        ],
        [  'title' => 'Fundamentals and FX Futures',
            'description' => 'FX contract are priced based on how much of one country’s currency it takes to buy one unit of another country’s currency.',
            'srcId' => '8XVPdXiroB0'
        ],
        [  'title' => 'Futures Supply and Demand',
            'description' => 'Supply and demand is a key economic concept that attempts to explain what the market is willing to pay for a given product, where the quantity produced is equal to the quantity demanded.',
            'srcId' => 'EZrc2JgEOkY'
        ],
        [  'title' => 'Fundamental and Equity Index Futures',
            'description' => 'Fundamentals are important in the analysis of a futures contracts price. Each futures market will have unique fundamental factors that will affect price.',
            'srcId' => 'JIygbPjoA3s'
        ]
    );
    public $riskData = array(
        [  'title' => 'Building a Trade Plan',
            'description' => 'Building your trading plan
Starting any business requires a plan – and building a trading plan is a crucial step in your development as a trader. Your trading plan is a working document in which you make assumptions about projected costs, revenues, and business conditions about projected costs, revenues, and business conditions. A plan won’t guarantee you’ll make money, but it will help you define your goals, your trading methodology, risk management, trading strategies and how you track your progress.
',
            'srcId' => 'wX6g0nskDRc'
        ],
        [  'title' => 'The 2% Rule',
            'description' => 'Meet the 2% rule
Protecting your capital means having rules and sticking to them. One of the most popular methods of managing risks is the 2% rule, which means never putting more than 2 % of your equity at risk. If you trade with $50,000 for example, using a 2% stop loss means you could risk up to $1,000 on any given trade. Although the 2% rule is popular, you can choose any level that’s comfortable for you.
',
            'srcId' => 'BdloGZYfWkY'
        ],
        [  'title' => 'Risk Aversion',
            'description' => 'Risk management know-how
Whether you trade stocks, FX, commodities or crypto, identifying your risk is job one. Before taking any new trade, it’s crucial to know where you will exit and how much equity is in your account. The difference between your entry price and stop-loss level tells you how much capital you can risk per trade.
',
            'srcId' => 'WolZt1pfwHY'
        ],
        [  'title' => 'Emotional Intelligence',
            'description' => 'Understanding Emotional Intelligence
You’ve traded and worked out your strategy – and you’re ready to take advantage of opportunities in the markets. But as many trades discover, something may stand in your way. No, it’s not market makers or high frequency trading programs – your biggest trading adversary is even more formidable and much closer to home. What you’re up against – is you
.',
            'srcId' => 'C_X1len1IM4'
        ],
        [  'title' => 'Keep a trade log',
            'description' => 'Dear trading diary
Trading is a business – and you’re not only the CEO, you’re also the accountant. By keeping a trade log, you’ll have an overview of you trading history – your profits or losses, and the bigger picture of how you’re developing as a trader. Honestly and self- awareness are important traits for any successful trader – and a daily review can help you better understand your trading performance.
',
            'srcId' => 'raNCUgK8jdI'
        ],
        [  'title' => 'Trader tips',
            'description' => 'Tips for every trader
Are you ready to trade? Before the market opens, traders need to be prepared. It’s crucial to understand your trading psychology and how you handle risk. Testing your skills and doing your homework on the markets you trade will also help you get into a trader mindset each day, so you’ll be ready to put your trading plan into action.
',
            'srcId' => 'ZQ22QF-SY4g'
        ]
        ,
        [  'title' => 'Trading psychology',
            'description' => 'Mind over money
Many experienced traders say that the most important part of trading isn’t your system, strategy or even learning how to control risk. Instead, it’s learning how to control your own emotions. As a trader, understanding the psychology of trading and the barriers we put in the way of our success could be the most important step you take on your trading journey.
',
            'srcId' => '_-wUSi2YX-U'
        ]
        ,
        [  'title' => 'Controlling Risk',
            'description' => 'Tighten your control
By using an even tighter 1% rule, you can prepare your capital more effectively and slow your account’s decay when you experience a losing streak. Whenever you use 2% or 1% for risk management is up to you – what’s important is understanding your risk tolerance and having a plan to keep your losses and control.

',
            'srcId' => 'JFgZqYGQVPI'
        ]
        ,
        [  'title' => 'Trading strategies and your trade plan',
            'description' => 'Building your trading strategy
You know your risk profile and the markets you want to trade – but how will you find the specific trades you want to make? A trading strategy gives you clear rules for every trade you take. These include criteria for finding setups with a high probability of success and establishing where you exit points – stop loss and profit target – will be in advance. That way, you’ll be able to trade your plan, and not your emotions.

',
            'srcId' => 'jwHWShrbuu8'
        ]
        ,
        [  'title' => 'Methodology Behind Your Trade Plan',
            'description' => 'Your trading methodology 
Deciding how you intend to conduct your trading business – your methodology – is central to any trading plan. Start with some self-analysis – What is your experience level? Are you mentally ready for trading? – and consider what type of trader you may be. You’ll also need to know which markets you want to trade, when they’re open. How much equity you plan to use and what your risk tolerance is.
',
            'srcId' => 'xkkY0-2Hquo'
        ]
        ,
        [  'title' => 'Risk management and your trade plan',
            'description' => 'Risk management and your trade plan
What is your attitude towards risk? What proportion of your capital are you prepared to put on the line on any one trade? Defining your risk profile is an essential part of any trading plan – it’s where you’ll consider how much leverage to use, your maximum trade loss and maximum daily loss. That way, it’s easier to find trades that work for you and avoid those that are too risky.
',
            'srcId' => 'QdbUdYtm9DU'
        ]
    );
    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {
        // $this->profile = Auth::user()->userProfile()->first();
        // if($this->profile == null) {
        //     return redirect()->to(route('profile.show'));
        // }
        $this->educationCategory = true;
        // $this->videoModal = false;
    }

    public function save()
    {
        // $this->validate([
        //     'front' => 'required|image|max:2048', // 1MB Max
        //     'back' => 'required|image|max:2048', // 1MB Max
        //     'type_of_id' => 'required',
        // ]);

        // $this->profile->id_front_path = $this->front->store('identification');
        // $this->profile->id_back_path = $this->back->store('identification');
        // $this->profile->id_type = $this->type_of_id;
        // $this->profile->save();

        // return redirect()->to(route('dashboard'));
    }

    public function showTechnical(){
        $this->technicalCategory = true;
        $this->educationCategory = false;
        $this->fundamentalCategory = false;
        $this->riskCategory = false;
        
        $this->educationData = $this->techData;
    }
    public function showFundamental(){
        $this->technicalCategory = false;
        $this->educationCategory = false;
        $this->fundamentalCategory = true;
        $this->riskCategory = false;
        
        $this->educationData = $this->fundData;
    }
    public function showRisk(){
        $this->technicalCategory = false;
        $this->educationCategory = false;
        $this->fundamentalCategory = false;
        $this->riskCategory = true;
        
        $this->educationData = $this->riskData;
    }
    public function goBack(){
        $this->technicalCategory = false;
        $this->educationCategory = true;
        $this->fundamentalCategory = false;
        $this->riskCategory = false;
    }
    // public function showVModal(){
    //     $this->videoModal = true;
    // }
    // public function closeVModal(){
    //     $this->videoModal = false;
    // }

    public function render()
    {
        return view('livewire.education');
    }
}
