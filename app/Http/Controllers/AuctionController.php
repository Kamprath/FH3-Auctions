<?php namespace App\Http\Controllers;

use App\Repositories\AuctionRepository;
use Illuminate\View\View;

class AuctionController extends Controller
{
    /**
     * @var
     */
    protected $auctions;

    public function __construct(AuctionRepository $auctionRepository)
    {
        $this->auctions = $auctionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('auctions.index', [
            'auctions' => $this->auctions->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function edit(int $id)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
}
