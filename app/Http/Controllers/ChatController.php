<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Http\Request;
use Auth;
use App\Events\MessageSent;


class ChatController extends Controller
{

	private $user;

    public function __construct() {
    	$this->middleware('auth');
    	// $this->user = Auth::user();
    }

    /**
	 * Show chats
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view ('chat');
	}

	/**
	 * Fetch all messages
	 *
	 * @return Message
	 */
	public function fetchMessages() {
		return Message::with('user')->get();
	}

	/**
	 * Persist message to database
	 *
	 * @param  Request $request
	 * @return Response
	 */
	public function sendMessage(Request $request) {
		$user = Auth::user();

		$message = $user->messages()->create([
			'message' => $request->input('message')
		]);
		
		broadcast(new MessageSent($user, $message))->toOthers();

		return ['status' => 'Message Sent!'];
	}
}
