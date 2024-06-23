<?php
namespace StudentsCabin\Team;

use StudentsCabin\Crud\Crud;

class Team
{
    public static $table = DEF_TBL_TEAMS;
    public static $data = [];

    public static function getTeams($arFields=['*'])
    {
        $fields = is_array($arFields) ? implode(', ', $arFields) : $arFields;

        return Crud::select(
            self::$table,
            [
                'columns' => $fields,
                'where' => ['deleted' => 0],
                'return_type' => 'all',
                'order' => '`rank` ASC'
            ]
        );
    }
    
    public static function getTeamMember($id, $arFields=['*'])
    {
        $fields = is_array($arFields) ? implode(', ', $arFields) : $arFields;

        return Crud::select(
            self::$table,
            [
                'columns' => $fields,
                'where' => ['id' => $id],
                'return_type' => 'row'
            ]
        );
    }
}