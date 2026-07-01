        SchemaDisableCheck:
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('skp_details')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        if (DB::getDriverName() === 'sqlite') {
            DB::statement('PRAGMA foreign_keys = OFF;');
            DB::table('skp_details')->truncate();
            DB::statement('PRAGMA foreign_keys = ON;');
        } else {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('skp_details')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
