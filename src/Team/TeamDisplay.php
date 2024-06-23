<?php
namespace StudentsCabin\Team;

class TeamDisplay extends Team
{
    public static $table = DEF_TBL_TEAMS;
    public static $data = [];

    public static function getTeamsDisplay()
    {
        $rs = self::getTeams([
            'id', 'name', 'role', 'description'
        ]);
        $teams = '';
        if (count($rs) > 0)
        {
            foreach ($rs as $r)
            {
                $id = $r['id'];
                $name = $r['name'];
                $role = $r['role'];
                $description = $r['description'];

                /*
                <div class="volunteers-one__img">
                    <img src="assets/images/team/volunteers-1-1.jpg" alt="{$name}">
                </div>
                */

                $teams .= <<<EOQ
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="volunteers-one__single">
                        <div class="volunteers-one__img">
                            <img src="assets/images/team/volunteers-1-1.jpg" alt="">
                        </div>
                        <div class="volunteers-one__content">
                            <a href="team-member?id={$id}">
                                <h4 class="volunteers-one__name">{$name}</h4>
                                <p class="volunteers-one__title">{$role}</p>
                            </a>
                            <p style="text-align:left;" class="p-4">{$description}</p>
                        </div>
                    </div>
                </div>
EOQ;
            }
        }
        return $teams;
    }
    
    public static function getTeamsCarouselDisplay()
    {
        $rs = self::getTeams([
            'id', 'name', 'role'
        ]);
        $teams = '';
        if (count($rs) > 0)
        {
            foreach ($rs as $r)
            {
                $id = $r['id'];
                $name = $r['name'];
                $role = $r['role'];

                /*
                <div class="volunteers-one__img">
                    <img src="assets/images/team/volunteers-1-1.jpg" alt="{$name}">
                </div>
                */

                $teams .= <<<EOQ
                <div class="item">
                    <div class="volunteers-one__single">
                        <a href="team-member?id={$id}">
                            <div class="volunteers-one__content">
                                <h4 class="volunteers-one__name">{$name}</h4>
                                <p class="volunteers-one__title">{$role}</p>
                            </div>
                        </a>
                    </div>
                </div>
EOQ;
            }
        }
        return $teams;
    }
}