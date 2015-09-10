<?php namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: ramaro
 * Date: 9/5/15
 * Time: 7:04 PM
 */

use App\Jobs\SlackInvitationJob;
use App\Services\SlackBadgeService;
use App\Services\SlackStatusService;
use Illuminate\Contracts\Cache\Factory as Cache;
use Illuminate\Http\Request;

class SlackController extends Controller
{
    /**
     * @var \Illuminate\Cache\Repository
     */
    protected $cache;

    /**
     * @var SlackStatusService
     */
    protected $slack;

    /**
     * @param Cache              $cache
     * @param SlackStatusService $slack
     */
    public function __construct(Cache $cache, SlackStatusService $slack)
    {
        $this->cache = $cache;
        $this->slack = $slack;
    }

    /**
     * Envia email de contato.
     *
     * @param  Request  $request
     * @return Response
     */
    public function getIndex(Request $request) {
        $data = [
            'team' => $this->slack->getTeamInfo(),
        ];

        if (env('SLACK_STATUS_ENABLED', true)) {
            $data['totals'] = $this->slack->getUsersStatus();
        }

        return view('slack.index', $data);
    }

    public function postInvite(Request $request) {
        $this->validate(
            $request,
            [
                'email' => 'required|email',
            ]
        );

        $this->dispatch(
            new SlackInvitationJob(
                $request->get('email'),
                $request->get('username')
            )
        );

        return [
            'message' => trans('slackin.invited'),
        ];
    }

    /**
     * Generate the badge poser.
     *
     * @param    SlackBadgeService $badge
     * @param    Request           $request
     * @return   Response
     * @internal param SlackStatusService $slack
     * @internal param Poser $poser
     */
    public function getBadge(SlackBadgeService $badge, Request $request) {
        return $badge->generate($request->get('format', 'flat'));
    }
}