<?php

namespace JalalLinuX\Pm2\Structure;

final class Env
{
    public ?string $uniqueId;

    public ?string $pm2Home;

    public ?string $shell;

    public ?string $sessionManager;

    public ?string $qtAccessibility;

    public ?string $snapRevision;

    public ?string $xdgConfigDirs;

    public ?string $xdgMenuPrefix;

    public ?string $gnomeDesktopSessionId;

    public ?string $snapRealHome;

    public ?string $terminalEmulator;

    public ?string $snapUserCommon;

    public ?string $lcAddress;

    public ?string $gnomeShellSessionMode;

    public ?string $lcName;

    public ?string $sshAuthSock;

    public ?string $termSessionId;

    public ?string $snapInstanceKey;

    public ?string $xmodifiers;

    public ?string $desktopSession;

    public ?string $lcMonetary;

    public ?string $sshAgentPid;

    public ?string $bamfDesktopFileHint;

    public ?string $gtkModules;

    public ?string $pwd;

    public ?string $xdgSessionDesktop;

    public ?string $logname;

    public ?string $xdgSessionType;

    public ?string $gpgAgentInfo;

    public ?string $xauthority;

    public ?string $desktopStartupId;

    public ?string $snapContext;

    public ?string $gjsDebugTopics;

    public ?string $windowpath;

    public ?string $home;

    public ?string $username;

    public ?string $imConfigPhase;

    public ?string $lang;

    public ?string $lcPaper;

    public ?string $lsColors;

    public ?string $xdgCurrentDesktop;

    public ?string $snapArch;

    public ?string $snapInstanceName;

    public ?string $snapUserData;

    public ?string $compWordbreaks;

    public ?string $invocationId;

    public ?string $managerpid;

    public ?string $snapReexec;

    public ?string $gjsDebugOutput;

    public ?string $lessclose;

    public ?string $xdgSessionClass;

    public ?string $term;

    public ?string $lcIdentification;

    public ?string $lessopen;

    public ?string $user;

    public ?string $snap;

    public ?string $snapCommon;

    public ?string $snapVersion;

    public ?string $display;

    public ?string $shlvl;

    public ?string $snapLibraryPath;

    public ?string $snapCookie;

    public ?string $lcTelephone;

    public ?string $qtImModule;

    public ?string $lcMeasurement;

    public ?string $snapData;

    public ?string $xdgRuntimeDir;

    public ?string $lcTime;

    public ?string $snapName;

    public ?string $journalStream;

    public ?string $xdgDataDirs;

    public ?string $path;

    public ?string $gdmsession;

    public ?string $dbusSessionBusAddress;

    public ?string $gioLaunchedDesktopFilePid;

    public ?string $gioLaunchedDesktopFile;

    public ?string $lcNumeric;

    public ?string $_;

    public ?string $pm2Usage;

    public static function fromJson(array $data): self
    {
        $instance = new self();
        $instance->uniqueId = $data['unique_id'] ?? null;
        $instance->pm2Home = $data['PM2_HOME'] ?? null;
        $instance->shell = $data['SHELL'] ?? null;
        $instance->sessionManager = $data['SESSION_MANAGER'] ?? null;
        $instance->qtAccessibility = $data['QT_ACCESSIBILITY'] ?? null;
        $instance->snapRevision = $data['SNAP_REVISION'] ?? null;
        $instance->xdgConfigDirs = $data['XDG_CONFIG_DIRS'] ?? null;
        $instance->xdgMenuPrefix = $data['XDG_MENU_PREFIX'] ?? null;
        $instance->gnomeDesktopSessionId = $data['GNOME_DESKTOP_SESSION_ID'] ?? null;
        $instance->snapRealHome = $data['SNAP_REAL_HOME'] ?? null;
        $instance->terminalEmulator = $data['TERMINAL_EMULATOR'] ?? null;
        $instance->snapUserCommon = $data['SNAP_USER_COMMON'] ?? null;
        $instance->lcAddress = $data['LC_ADDRESS'] ?? null;
        $instance->gnomeShellSessionMode = $data['GNOME_SHELL_SESSION_MODE'] ?? null;
        $instance->lcName = $data['LC_NAME'] ?? null;
        $instance->sshAuthSock = $data['SSH_AUTH_SOCK'] ?? null;
        $instance->termSessionId = $data['TERM_SESSION_ID'] ?? null;
        $instance->snapInstanceKey = $data['SNAP_INSTANCE_KEY'] ?? null;
        $instance->xmodifiers = $data['XMODIFIERS'] ?? null;
        $instance->desktopSession = $data['DESKTOP_SESSION'] ?? null;
        $instance->lcMonetary = $data['LC_MONETARY'] ?? null;
        $instance->sshAgentPid = $data['SSH_AGENT_PID'] ?? null;
        $instance->bamfDesktopFileHint = $data['BAMF_DESKTOP_FILE_HINT'] ?? null;
        $instance->gtkModules = $data['GTK_MODULES'] ?? null;
        $instance->pwd = $data['PWD'] ?? null;
        $instance->xdgSessionDesktop = $data['XDG_SESSION_DESKTOP'] ?? null;
        $instance->logname = $data['LOGNAME'] ?? null;
        $instance->xdgSessionType = $data['XDG_SESSION_TYPE'] ?? null;
        $instance->gpgAgentInfo = $data['GPG_AGENT_INFO'] ?? null;
        $instance->xauthority = $data['XAUTHORITY'] ?? null;
        $instance->desktopStartupId = $data['DESKTOP_STARTUP_ID'] ?? null;
        $instance->snapContext = $data['SNAP_CONTEXT'] ?? null;
        $instance->gjsDebugTopics = $data['GJS_DEBUG_TOPICS'] ?? null;
        $instance->windowpath = $data['WINDOWPATH'] ?? null;
        $instance->home = $data['HOME'] ?? null;
        $instance->username = $data['USERNAME'] ?? null;
        $instance->imConfigPhase = $data['IM_CONFIG_PHASE'] ?? null;
        $instance->lang = $data['LANG'] ?? null;
        $instance->lcPaper = $data['LC_PAPER'] ?? null;
        $instance->lsColors = $data['LS_COLORS'] ?? null;
        $instance->xdgCurrentDesktop = $data['XDG_CURRENT_DESKTOP'] ?? null;
        $instance->snapArch = $data['SNAP_ARCH'] ?? null;
        $instance->snapInstanceName = $data['SNAP_INSTANCE_NAME'] ?? null;
        $instance->snapUserData = $data['SNAP_USER_DATA'] ?? null;
        $instance->compWordbreaks = $data['COMP_WORDBREAKS'] ?? null;
        $instance->invocationId = $data['INVOCATION_ID'] ?? null;
        $instance->managerpid = $data['MANAGERPID'] ?? null;
        $instance->snapReexec = $data['SNAP_REEXEC'] ?? null;
        $instance->gjsDebugOutput = $data['GJS_DEBUG_OUTPUT'] ?? null;
        $instance->lessclose = $data['LESSCLOSE'] ?? null;
        $instance->xdgSessionClass = $data['XDG_SESSION_CLASS'] ?? null;
        $instance->term = $data['TERM'] ?? null;
        $instance->lcIdentification = $data['LC_IDENTIFICATION'] ?? null;
        $instance->lessopen = $data['LESSOPEN'] ?? null;
        $instance->user = $data['USER'] ?? null;
        $instance->snap = $data['SNAP'] ?? null;
        $instance->snapCommon = $data['SNAP_COMMON'] ?? null;
        $instance->snapVersion = $data['SNAP_VERSION'] ?? null;
        $instance->display = $data['DISPLAY'] ?? null;
        $instance->shlvl = $data['SHLVL'] ?? null;
        $instance->snapLibraryPath = $data['SNAP_LIBRARY_PATH'] ?? null;
        $instance->snapCookie = $data['SNAP_COOKIE'] ?? null;
        $instance->lcTelephone = $data['LC_TELEPHONE'] ?? null;
        $instance->qtImModule = $data['QT_IM_MODULE'] ?? null;
        $instance->lcMeasurement = $data['LC_MEASUREMENT'] ?? null;
        $instance->snapData = $data['SNAP_DATA'] ?? null;
        $instance->xdgRuntimeDir = $data['XDG_RUNTIME_DIR'] ?? null;
        $instance->lcTime = $data['LC_TIME'] ?? null;
        $instance->snapName = $data['SNAP_NAME'] ?? null;
        $instance->journalStream = $data['JOURNAL_STREAM'] ?? null;
        $instance->xdgDataDirs = $data['XDG_DATA_DIRS'] ?? null;
        $instance->path = $data['PATH'] ?? null;
        $instance->gdmsession = $data['GDMSESSION'] ?? null;
        $instance->dbusSessionBusAddress = $data['DBUS_SESSION_BUS_ADDRESS'] ?? null;
        $instance->gioLaunchedDesktopFilePid = $data['GIO_LAUNCHED_DESKTOP_FILE_PID'] ?? null;
        $instance->gioLaunchedDesktopFile = $data['GIO_LAUNCHED_DESKTOP_FILE'] ?? null;
        $instance->lcNumeric = $data['LC_NUMERIC'] ?? null;
        $instance->_ = $data['_'] ?? null;
        $instance->pm2Usage = $data['PM2_USAGE'] ?? null;

        return $instance;
    }
}
