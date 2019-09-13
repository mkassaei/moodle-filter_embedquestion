<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Token management.
 *
 * @package   filter_embedquestion
 * @copyright 2018 The Open University
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace filter_embedquestion;
defined('MOODLE_INTERNAL') || die();


/**
 * Helper methods for getting the secure tokens.
 *
 * @copyright 2018 The Open University
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class token {

    /**
     * Compute the security token used to validate the embedding code.
     *
     * @param embed_id $embedid the embed code.
     * @return string the security token.
     */
    public static function make_secret_token(embed_id $embedid): string {
        $secret = get_config('filter_embedquestion', 'secret');
        return hash('sha256', $embedid . '#embed#' . $secret);
    }

    /**
     * Compute the security token used to validate the contents of the iframe.
     *
     * @param embed_id $embedid the embed code.
     * @return string the security token.
     */
    public static function make_iframe_token(embed_id $embedid): string {
        $secret = get_config('filter_embedquestion', 'secret');
        return hash('sha256', $embedid . '#iframe#' . $secret);
    }
}
